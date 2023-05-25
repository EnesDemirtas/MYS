<?php

namespace App\Http\Controllers;
use App\Models\teklif;
use Illuminate\Http\Request;

class Teklifler extends Controller
{
    // Bütün Teklifleri Göster
    public function index()
    {
        $teklifler = teklif::All();
        return view('teklifler',compact("teklifler"));
    }

    public function teklifEkle(Request $request) {
        $request->validate([
            'yetkiliismi' => 'required',
            'yetkiliemail' => 'required|email',
            'musteriadres' => 'required',
            'musteritelefon' => 'required',
            'date' => 'required',
            'due' => 'required',
            'sirketismi' => 'required',
        ], [
            'yetkiliismi.required' => 'Lütfen isminizi giriniz',
            'yetkiliemail.required' => 'E-posta boş bırakılamaz',
            'musteriadres.email' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);

            $teklif = new teklif();
            $teklif->teklif_veren_isim = $request->input('yetkiliismi');
            $teklif->teklif_veren_email = $request->input('yetkiliemail');
            $teklif->teklif_veren_adres = $request->input('musteriadres');
            $teklif->teklif_veren_telefon = $request->input('musteritelefon');
            $teklif->teklif_baslangic_tarihi = $request->input('date');
            $teklif->teklif_bitis_tarihi = $request->input('due');
            $teklif->teklif_veren_sirket = $request->input('sirketismi');
            $teklif->teklif_veren_not = $request->input('not');
            $teklif->save();
            return redirect()->back()->with("success","Teklif başarıyla oluşturuldu!");
        
    }

    public function teklif_onizle(Request $request){
        $request->validate([
            'yetkiliismi' => 'required',
            'yetkiliemail' => 'required|email',
            'musteriadres' => 'required',
            'musteritelefon' => 'required',
            'date' => 'required',
            'due' => 'required',
            'sirketismi' => 'required',
        ], [
            'yetkiliismi.required' => 'Lütfen isminizi giriniz',
            'yetkiliemail.required' => 'E-posta boş bırakılamaz',
            'musteriadres.email' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);

            return redirect()->route('teklif_onizle')->with("success","Teklif!");
    }
}
