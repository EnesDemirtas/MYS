<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function login(Request $request) {
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

    public function register(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'username.required' => 'Kullanıcı adı boş bırakılamaz',
            'email.required' => 'E-posta boş bırakılamaz',
            'email.email' => 'Geçerli bir e-posta adresi giriniz',
            'password.required' => 'Şifre boş bırakılamaz'
        ]);

        $kullanici = calisan::where('ckullaniciadi', $request->input('username'))->first();
        $tckn = calisan::where('ctckn', $request->input('username'))->first();
        if ($kullanici || $tckn) {
            return back()->withErrors(['username' => 'Kullanıcı adı/TCKN kullanımda!'])->onlyInput('username');
        } else {
            $kullanici = new calisan();
            $kullanici->ckullaniciadi = $request->input('username');
            $kullanici->csifre = $request->input('password');
            $kullanici->ceposta = $request->input('email');
            $kullanici->save();
            return redirect()->route('giris_yap');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('giris_yap');
    }

    public function GetProfile(Request $request) {
        $kullanici = calisan::where('ckullaniciadi', $request->session()->get('kullanici')->ckullaniciadi)->first();
        if ($kullanici->cphoto != null or $kullanici->cphoto != ''){
            $kullanici->cphoto = Storage::url('photos/') . $kullanici->cphoto;
        }
        else {
            $kullanici->cphoto = asset('assets/img/img_avatar.png');
        }
        // dd($kullanici->cphoto);
        return view('profile', ['kullanici' => $kullanici]);
    }

    public function UploadPP(Request $request) {
        $path = $request->file('photo')->store('public/photos');
        $filename = explode('/', $path)[2];
        $kullanici = calisan::where('ckullaniciadi', $request->session()->get('kullanici')->ckullaniciadi)->first();
        $kullanici->update(['cphoto' => $filename]);
        session()->put('kullanici', $kullanici);
        return redirect()->route('profile', ['kullanici' => $kullanici]);
    }

    public function GetNewPassword(Request $request) {
        return view('sifre_yenileme_kod', ['eposta' => $request->query('eposta')]);
    }

}
