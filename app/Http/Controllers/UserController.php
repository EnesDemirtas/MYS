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
            'username.required' => 'Kullanıcı adı boş bırakılamaz',
            'password.required' => 'Şifre boş bırakılamaz'
        ]);

        $kullanici = calisan::where('ckullaniciadi', $request->input('username'))->first();
        if ($kullanici && $kullanici->csifre == $request->input('password')) {
            $request->session()->put('kullanici', $kullanici);
            return redirect()->route('anasayfa.index'); 
        } else {
            return back()->withErrors(['username' => 'Kullanıcı adı veya şifre hatalı!'])->onlyInput('username');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('giris_yap');
    }

}
