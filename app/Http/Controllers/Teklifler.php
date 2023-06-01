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
            ''
        ], [
            'yetkiliismi.required' => 'Lütfen isminizi giriniz',
            'yetkiliemail.required' => 'E-posta boş bırakılamaz',
            'musteriadres.email' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);

            
            teklif::create(array('teklif_baslangic_tarihi' => $request->date,'teklif_bitis_tarihi'=>$request->due, 'teklif_veren_isim' => $request->yetkiliismi,'teklif_veren_email' => $request->yetkiliemail,'teklif_veren_adres' => $request->musteriadres,'teklif_veren_telefon' => $request->musteritelefon));
            return redirect('teklifler')->with("success","Teklif başarıyla oluşturuldu!");
    }

    public function teklifOnizle(Request $request){
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
        
        return view('teklif_onizle',['yetkiliismi' => $request->yetkiliismi , 'yetkiliemail' => $request->yetkiliemail , 'musteriadres' => $request->musteriadres , 'musteritelefon' => $request->musteritelefon , 'date' => $request->date , 'due' => $request->due , 'sirketismi' => $request->sirketismi]);
    }
}
