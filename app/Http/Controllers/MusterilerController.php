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
        if ($request->mkayitturu == 'Ticari') {
            $request->validate([
                'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                'mtcknvno' => 'required|numeric',
                'mtmarkaadi' => 'required',
                'madres' => 'required',
                'mbolge' => 'required',
                'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz',
                'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz',
                'mmobil' => 'required',
                'menlem' => 'required',
                'meposta' => 'email',
                'mukodutel' => 'required',
            ],
            [   
                'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
                'mil.doesnt_start_with' => 'Lütfen müşterinin ilini giriniz.',
                'milce.doesnt_start_with' => 'Lütfen müşterinin ilçesini giriniz.',
                'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
                'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
                'mbsoyadi.required' => 'Lütfen müşteri soyadını boş bırakmayınız.',
                'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
                'milce.required' => 'Lütfen ilçeyi seçiniz.',
                'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
                'madres.required' => 'Lütfen müşterinin adresini giriniz.',
                'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                'meposta.required' => 'Lütfen müşterinin eposta adresini giriniz.',
                'mukodutel.required' => 'Lütfen müşteri telefonunun ülke kodunu giriniz.',
                'mmobil.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
                'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
            ]
        );
        } else {
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'mbunvani' => 'string',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbdogumgunu' => 'before:today',
            'madres' => 'required',
            'mbolge' => 'required',
            'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz',
            'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz',
            'mmobil' => 'required',
            'mukodutel' => 'required',
            'menlem' => 'required',
            'meposta' => 'email'
        ],
        [   
            'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
            'mil.doesnt_start_with' => 'Lütfen müşterinin ilini giriniz.',
            'milce.doesnt_start_with' => 'Lütfen müşterinin ilçesini giriniz.',
            'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
            'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
            'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
            'mbunvani.string' => 'Lütfen müşterinin ünvanını doğru girdiğinizden emin olunuz.',
            'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
            'mbsoyadi.required' => 'Lütfen müşteri soyadını boş bırakmayınız.',
            'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
            'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
            'milce.required' => 'Lütfen ilçeyi seçiniz.',
            'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
            'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'meposta.required' => 'Lütfen müşterinin eposta adresini giriniz.',
            'mukodutel.required' => 'Lütfen müşteri telefonunun ülke kodunu giriniz.',
            'mmobil.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
            'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
            'madres.required' => 'Lütfen müşterinin adresini giriniz.',
        ]
    );
    }

    $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
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

    public function musteriEkle(Request $request) {
        // Validate data
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz',
            'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbolge' => 'required',
            'menlem' => 'required',
            'mmobil' => 'required',
            'mukodutel' => 'required',
            'meposta' => 'email',
            'madres' => 'reqired',
        ],
        [   
            'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
            'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
            'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
            'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
            'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
            'mbsoyadi.required' => 'Lütfen çalışan telefonunu boş bırakmayınız.',
            'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
            'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'milce.required' => 'Lütfen ilçeyi seçiniz.',
            'milce.doesnt_start_with' => 'Lütfen ilçeyi seçiniz.',
            'mil.required' => 'Lütfen il seçiniz.',
            'mil.doesnt_start_with' => 'Lütfen il seçiniz.',
            'mukodutel.required' => 'Lütfen müşteri telefonunun ülke kodunu giriniz.',
            'mmobil.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
            'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
            'madres.required' => 'Lütfen müşterinin adresini giriniz.',
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
            musteri::where('mtcknvno', $request->mtcknvno)->update( array('mrefno'=>'sbe-0','aktif' => 1) );
            return redirect()->back()->with("success","Kayıt Başarıyla Eklendi!");
        }

    }

    public function musteriGuncelle(Request $request, $mtcknvno) {
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbdogumgunu' => 'before:today',
            'madres' => 'required',
            'mbolge' => 'required',
            'mmobil' => 'required',
            'menlem' => 'required',
            'mboylam' => 'required',
            'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz',
            'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz',
            'mmobil' => 'required',
            'mukodutel' => 'required',
            'meposta' => 'email',
        ],
        [   
            'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
            'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
            'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
            'mtmarkaadi.required' => 'Lütfen marka adını boş bırakmayınız.',
            'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
            'mbsoyadi.required' => 'Lütfen çalışan telefonunu boş bırakmayınız.',
            'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
            'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
            'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'mboylam.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
            'milce.required' => 'Lütfen ilçeyi seçiniz.',
            'milce.doesnt_start_with' => 'Lütfen ilçeyi seçiniz.',
            'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
            'mil.doesnt_start_with' => 'Lütfen il alanını boş bırakmayınız.',
            'mukodutel.required' => 'Lütfen müşteri telefonunun ülke kodunu giriniz.',
            'mmobil.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
            'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
            'madres.required' => 'Lütfen müşterinin adresini giriniz.',
        ]
    );
        $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
        musteri::where('mtcknvno', $mtcknvno)->update($request->except(['_token', '_method']));
        return redirect('musteriler')->with('success', 'Kayıt Başarıyla Güncellendi');
    }

    public function musteriSil($mtcknvno){
        // musteri::where('mtcknvno', $mtcknvno)->delete();
        musteri::where('mtcknvno', $mtcknvno)->update(['aktif' => 0]);
        return redirect()->back()->with("success","Müşteri Başarıyla Silindi.");
    }
}