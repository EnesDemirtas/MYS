<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calisan;
use App\Mail\ResetPasswordActivationCode;
use App\Models\ActivationCode;
use Illuminate\Support\Facades\Mail;

class ActivationCodeController extends Controller
{
    public function SendResetActivationCode(Request $request) {
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

    public function NewPassword(Request $request) {
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
            $kullanici->update(['csifre' => $request->password]);
            // $activationcode->delete();
            return redirect()->route('giris_yap')->with('sifre_degistirme_basarili', 'Şifreniz başarıyla değiştirildi!');
        }
    }
}
