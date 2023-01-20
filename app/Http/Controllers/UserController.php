<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;

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
            return redirect()->route('musteriler'); 
        } else if ($tckn && $tckn->csifre == $request->input('password')) {
            $request->session()->put('kullanici', $tckn);
            return redirect()->route('musteriler');
        } else {
            return back()->withErrors(['username' => 'Kullanıcı adı/TCKN veya şifre hatalı!'])->onlyInput('username');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('giris_yap');
    }

}
