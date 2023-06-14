<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;
use Illuminate\Support\Facades\Storage;

use Deligoez\TCKimlikNo\TCKimlikNo;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Kullanıcı adı/TCKN boş bırakılamaz',
            'password.required' => 'Şifre boş bırakılamaz'
        ]);

        $kullanici = calisan::where('ckullaniciadi', $request->input('username'))->first();
        $tckn = calisan::where('ctckn', $request->input('username'))->first();
        if ($kullanici && $kullanici->csifre == $request->input('password')) {
            $request->session()->put('kullanici', $kullanici);
            return redirect()->route('anasayfa.index');
        } else if ($tckn && $tckn->csifre == $request->input('password')) {
            $request->session()->put('kullanici', $tckn);
            return redirect()->route('anasayfa.index');
        } else {
            return back()->withErrors(['username' => 'Kullanıcı adı/TCKN veya şifre hatalı!'])->onlyInput('username');
        }
    }

    public function register(Request $request)
    {
        dd($request->tip);
        $request->validate([
            'username' => 'required',
            'cadi' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'tckn' => 'required',
            'csoyadi' => 'required',
            'dogumgunu' => 'required',
            'telefon' => 'required',
        ], [
            'username.required' => 'Kullanıcı adı boş bırakılamaz',
            'cadi.required' => 'Ad boş bırakılamaz',
            'email.required' => 'E-posta boş bırakılamaz',
            'email.email' => 'Geçerli bir e-posta adresi giriniz',
            'password.required' => 'Şifre boş bırakılamaz',
            'tckn.required' => 'TCKN boş bırakılamaz',
            'csoyadi.required' => 'Soyad boş bırakılamaz',
            'dogumgunu.required' => 'Doğum günü boş bırakılamaz',
            'telefon.required' => 'Telefon numarası boş bırakılamaz',
        ]);

        if($request->tip == "musteri"){

        }else if($request->tip == "calisan"){

        }else{
            return back()->withErrors(['gecersizTip' => 'Kayıt olurken bir hata oluştu. Lütfen bizimle iletişime geçiniz.']);
        }

        $kullanici = calisan::where('ckullaniciadi', $request->input('username'))->first();
        $tckn = calisan::where('ctckn', $request->input('tckn'))->first();
        // MERNIS kontrolu
        if (!TCKimlikNo::validate($request->tckn, $request->cadi, $request->csoyadi, explode("-", $request->dogumgunu)[0])) {
            return back()->withErrors(['mernis' => 'Geçersiz kimlik bilgileri!'])->onlyInput('username');
        }


        if ($kullanici) {
            return back()->withErrors(['username' => 'Kullanıcı adı/TCKN kullanımda!'])->onlyInput('username');
        } else if ($tckn) {
            return back()->withErrors(['tckn' => 'TCKN kullanımda!'])->onlyInput('tckn');
        } else {
            $kullanici = new calisan();
            $kullanici->ckullaniciadi = $request->input('username');
            $kullanici->csifre = $request->input('password');
            $kullanici->ceposta = $request->input('email');
            $kullanici->cadi = $request->input('cadi');
            $kullanici->csoyadi = $request->input('csoyadi');
            $kullanici->ctckn = $request->input('tckn');
            $kullanici->cdogum = $request->input('dogumgunu');
            $kullanici->save();
            return redirect()->route('giris_yap');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('giris_yap');
    }

    public function GetProfile(Request $request)
    {
        $kullanici = calisan::where('ckullaniciadi', $request->session()->get('kullanici')->ckullaniciadi)->first();
        if ($kullanici->cphoto != null or $kullanici->cphoto != '') {
            $kullanici->cphoto = Storage::url('photos/') . $kullanici->cphoto;
        } else {
            $kullanici->cphoto = asset('assets/img/img_avatar.png');
        }
        // dd($kullanici->cphoto);
        return view('profile', ['kullanici' => $kullanici]);
    }

    public function UploadPP(Request $request)
    {
        $path = $request->file('photo')->store('public/photos');
        $filename = explode('/', $path)[2];
        $kullanici = calisan::where('ckullaniciadi', $request->session()->get('kullanici')->ckullaniciadi)->first();
        $kullanici->update(['cphoto' => $filename]);
        session()->put('kullanici', $kullanici);
        return redirect()->route('profile', ['kullanici' => $kullanici]);
    }

    public function GetNewPassword(Request $request)
    {
        return view('sifre_yenileme_kod', ['eposta' => $request->query('eposta')]);
    }
}
