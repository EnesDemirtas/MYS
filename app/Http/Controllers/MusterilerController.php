<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musteri;

class MusterilerController extends Controller {
    // Show all musteriler
    public function index()
    {
        return view('musteriler', ['musteriler' => musteri::where('aktif',1)->get()]);
    }

    public function musteriDuzenle($mtcknvno)
    {
        return view('musteriBilgileriDuzenle',['musteri' => musteri::where('mtcknvno',$mtcknvno)->first()]);
    }

    public function store(Request $request) {
        // Validate data
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'monunvan' => 'string',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbdogumgunu' => 'required|before:today',
            'madres' => 'required',
            'mbolge' => 'required',
            'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz"',
            'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz"',
            'mmobil' => 'required',
            'menlem' => 'required',
            'mboylam' => 'required'
        ],
        [   
            'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
            'mil.doesnt_start_with' => 'Lütfen müşterinin ilini giriniz.',
            'milce.doesnt_start_with' => 'Lütfen müşterinin ilçesini giriniz.',
            'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
            'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
            'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
            'monunvan.required' => 'Lütfen müşterinin ünvanını boş bırakmayınız.',
            'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
            'mbsoyadi.required' => 'Lütfen çalışan telefonunu boş bırakmayınız.',
            'mbdogumgunu.required' => 'Lütfen doğum gününü boş bırakmayınız.',
            'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
            'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
            'milce.required' => 'Lütfen ilçeyi seçiniz.',
            'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
            'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'mboylam.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
        ]
    );
    $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
    musteri::create($request->all());
    musteri::where('mtcknvno', $request->mtcknvno)->update( array('aktif' => 1) );
    return redirect('musteriler')->with('success', 'Kayıt Başarıyla Eklendi');
    }

    public function musteriEkle(Request $request) {
        // Validate data
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required'
        ]);

        $musteriSayisiBul = musteri::where('satirid', '>', '0')->get();
        $musteriSayisi = $musteriSayisiBul->count(); // Kaç çalışan olduğunu saydırır.

        if (musteri::where('mtcknvno', $request->mtcknvno)->exists()) {
            return redirect()->back()->with('error', 'Bu TCKN/Vergi No ile kayıtlı bir müşteri bulunmaktadır.');
        }else if($musteriSayisi > 0){ // Tablo boş değilse
            $sonmusteri = musteri::orderBy('satirid', 'desc')->first()->satirid; //Son Çalışanın Satır ID'sini getirir.
            musteri::create($request->all());
            musteri::where('mtcknvno', $request->mtcknvno)->update( array('mrefno'=>'sbe-'.$sonmusteri++.'','aktif' => 1) );
            return redirect()->back()->with("success","Kayıt Başarıyla Eklendi!");
        }else{ // Tablo Boşsa
            musteri::create($request->all());
            musteri::where('mtcknvno', $request->mtcknvno)->update( array('mrefno'=>'sbe-1','aktif' => 1) );
            return redirect()->back()->with("success","Kayıt Başarıyla Eklendi!");
        }

    }

    public function musteriGuncelle(Request $request, $mtcknvno) {
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'monunvan' => 'string',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbdogumgunu' => 'required|before:today',
            'madres' => 'required',
            'mbolge' => 'required',
            'mmobil' => 'required',
            'menlem' => 'required',
            'mboylam' => 'required',
        ],
        [   
            'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
            'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
            'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
            'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
            'monunvan.required' => 'Lütfen müşterinin ünvanını boş bırakmayınız.',
            'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
            'mbsoyadi.required' => 'Lütfen çalışan telefonunu boş bırakmayınız.',
            'mbdogumgunu.required' => 'Lütfen doğum gününü boş bırakmayınız.',
            'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
            'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
            'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'mboylam.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
        ]
    );
        $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
        musteri::where('mtcknvno', $mtcknvno)->update($request->except(['_token', '_method']));
        return redirect('musteriler')->with('success', 'Kayıt Başarıyla Güncellendi');
    }

    public function musteriSil($mtcknvno){
        // musteri::where('mtcknvno', $mtcknvno)->delete();
        $musteri = musteri::where('mtcknvno', $mtcknvno)->first();
        $musteri->aktif = 0;
        $musteri->save();
        return redirect()->back()->with("success","Müşteri Başarıyla Silindi.");
    }
}