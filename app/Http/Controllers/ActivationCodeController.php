<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calisan;
use App\Models\musteri;
use App\Mail\ResetPasswordActivationCode;
use App\Models\ActivationCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ActivationCodeController extends Controller
{
    public function SendResetActivationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'E-posta boş bırakılamaz',
            'email.email' => 'Geçerli bir e-posta adresi giriniz'
        ]);

        $kullanici = calisan::where('ceposta', $request->input('email'))->first();
        if ($kullanici) {
            $activation_code = rand(100000, 999999);
            $expires_at = now()->addMinutes(5);
            $activationcode = ActivationCode::create([
                'eposta' => $kullanici->ceposta,
                'aktivasyonkodu' => $activation_code,
                'sure' => $expires_at
            ]);

            Mail::to($kullanici->ceposta)->send(new ResetPasswordActivationCode($activationcode));

            // return view('sifre_yenileme_kod', ['aktivasyonkodu' => $activationcode]);
            // dd($activationcode->eposta);
            return redirect()->route('get_new_password', ['eposta' => $activationcode->eposta]);
        } else {
            return back()->withErrors(['email' => 'E-posta adresi bulunamadı!'])->onlyInput('email');
        }
    }

    public function NewPassword(Request $request)
    {
        $request->validate([
            'aktivasyonkodu' => 'required',
            'password' => 'required|confirmed|min:6'
        ], [
            'aktivasyonkodu.required' => 'Aktivasyon kodu boş bırakılamaz',
            'password.required' => 'Şifre boş bırakılamaz',
            'password.confirmed' => 'Şifreler eşleşmiyor!',
            'password.min' => 'Şifre en az 6 karakter olmalıdır!'
        ]);

        $activationcode = ActivationCode::where('eposta', $request->email)->orderBy('created_at', 'desc')->first();
        if ($activationcode->sure < now()) {
            $activation_code = rand(100000, 999999);
            $expires_at = now()->addMinutes(5);
            $activationcode = ActivationCode::create([
                'eposta' => $request->email,
                'aktivasyonkodu' => $activation_code,
                'sure' => $expires_at
            ]);

            Mail::to($request->email)->send(new ResetPasswordActivationCode($activationcode));
            return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu süresi doldu! Yeni kod mail adresinize gönderildi.'])->onlyInput('aktivasyonkodu');
        } else if ($request->aktivasyonkodu != $activationcode->aktivasyonkodu) {
            return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu hatalı!']);
        } else {
            $kullanici = calisan::where('ceposta', $request->email)->first();
            $kullanici->update(['csifre' => Hash::make($request->password)]);
            // $activationcode->delete();
            return redirect()->route('giris_yap')->with('sifre_degistirme_basarili', 'Şifreniz başarıyla değiştirildi!');
        }
    }

    public function SendRegisterActivationCode(Request $request)
    {
        if (!isset($request->tip)) {
            $request->validate([
                'eposta' => 'required|email'
            ], [
                'eposta.required' => 'E-posta boş bırakılamaz',
                'eposta.email' => 'Geçerli bir e-posta adresi giriniz'
            ]);
            $calisan = calisan::where('ceposta', $request->input('eposta'))->first();
            $musteri = musteri::where('meposta', $request->input('eposta'))->first();
            if ($calisan) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'eposta' => $calisan->ceposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($calisan->ceposta)->send(new ResetPasswordActivationCode($activationcode));
                // return view('sifre_yenileme_kod', ['aktivasyonkodu' => $activationcode]);
                return redirect()->route('load_register_activation_code', ['eposta' => $activationcode->eposta, 'tip' => 'Çalışan']);
            } else if ($musteri) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'eposta' => $musteri->meposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($musteri->meposta)->send(new ResetPasswordActivationCode($activationcode));
                // return view('sifre_yenileme_kod', ['aktivasyonkodu' => $activationcode]);
                return redirect()->route('load_register_activation_code_musteri', ['eposta' => $activationcode->eposta, 'tip' => 'Müşteri']);
            } else {
                return back()->withErrors(['eposta' => 'E-posta adresi bulunamadı!'])->onlyInput('eposta');
            }
        }
        if ($request->tip == "Müşteri") {
            $request->validate([
                'meposta' => 'required|email'
            ], [
                'meposta.required' => 'E-posta boş bırakılamaz',
                'meposta.email' => 'Geçerli bir e-posta adresi giriniz'
            ]);

            $kullanici = musteri::where('meposta', $request->input('meposta'))->first();
            if ($kullanici) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'eposta' => $kullanici->meposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($kullanici->meposta)->send(new ResetPasswordActivationCode($activationcode));
                // return view('sifre_yenileme_kod', ['aktivasyonkodu' => $activationcode]);
                return redirect()->route('load_register_activation_code_musteri', ['meposta' => $activationcode->eposta, 'tip' => 'Müşteri']);
            } else {
                return back()->withErrors(['ceposta' => 'E-posta adresi bulunamadı!'])->onlyInput('ceposta');
            }
        } else if ($request->tip == "Çalışan") {
            $request->validate([
                'ceposta' => 'required|email'
            ], [
                'ceposta.required' => 'E-posta boş bırakılamaz',
                'ceposta.email' => 'Geçerli bir e-posta adresi giriniz'
            ]);

            $kullanici = calisan::where('ceposta', $request->input('ceposta'))->first();
            if ($kullanici) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'eposta' => $kullanici->ceposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($kullanici->ceposta)->send(new ResetPasswordActivationCode($activationcode));

                // return view('sifre_yenileme_kod', ['aktivasyonkodu' => $activationcode]);
                return redirect()->route('load_register_activation_code', ['ceposta' => $activationcode->eposta, 'tip' => 'Çalışan']);
            } else {
                return back()->withErrors(['ceposta' => 'E-posta adresi bulunamadı!'])->onlyInput('ceposta');
            }
        } else {
            return redirect()->route('pages_error404');
        }
    }

    public function ActivateAccount(Request $request)
    {
        if ($request->tip == 'Çalışan') {
            $request->validate([
                'aktivasyonkodu' => 'required'
            ], [
                'aktivasyonkodu.required' => 'Aktivasyon kodu boş bırakılamaz'
            ]);

            $activationcode = ActivationCode::where('eposta', $request->ceposta)->orderBy('created_at', 'desc')->first();
            if ($activationcode->sure < now()) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'ceposta' => $request->ceposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($request->ceposta)->send(new ResetPasswordActivationCode($activationcode));
                return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu süresi doldu! Yeni kod mail adresinize gönderildi.'])->onlyInput('aktivasyonkodu');
            } else if ($request->aktivasyonkodu != $activationcode->aktivasyonkodu) {
                return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu hatalı!']);
            } else {
                $kullanici = calisan::where('ceposta', $request->ceposta)->first();
                $kullanici->update(['caktif' => 1]);
                // $activationcode->delete();
                return redirect()->route('giris_yap')->with('aktivasyon_basarili', 'Hesabınız başarıyla aktifleştirildi!');
            }
        } else if ($request->tip == 'Müşteri') {
            $request->validate([
                'aktivasyonkodu' => 'required'
            ], [
                'aktivasyonkodu.required' => 'Aktivasyon kodu boş bırakılamaz'
            ]);

            $activationcode = ActivationCode::where('eposta', $request->meposta)->orderBy('created_at', 'desc')->first();
            if ($activationcode->sure < now()) {
                $activation_code = rand(100000, 999999);
                $expires_at = now()->addMinutes(5);
                $activationcode = ActivationCode::create([
                    'meposta' => $request->meposta,
                    'aktivasyonkodu' => $activation_code,
                    'sure' => $expires_at
                ]);

                Mail::to($request->meposta)->send(new ResetPasswordActivationCode($activationcode));
                return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu süresi doldu! Yeni kod mail adresinize gönderildi.'])->onlyInput('aktivasyonkodu');
            } else if ($request->aktivasyonkodu != $activationcode->aktivasyonkodu) {
                return back()->withErrors(['aktivasyonkodu' => 'Aktivasyon kodu hatalı!']);
            } else {
                $kullanici = musteri::where('meposta', $request->meposta)->first();
                $kullanici->update(['maktif' => 1]);
                // $activationcode->delete();
                return redirect()->route('giris_yap')->with('aktivasyon_basarili', 'Hesabınız başarıyla aktifleştirildi!');
            }
        } else {
            return redirect()->route('pages_error404');
        }
    }

    public function GetRegisterActivationCode()
    {
        return view('get_register_activation_code');
    }
}
