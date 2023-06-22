<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musteri;
// use Illuminate\Support\Facades\Redis;


class MusterilerController extends Controller
{
    // Show all musteriler
    public function index()
    {

        $musteriler = musteri::where('maktif', 1)->get();

        return view('musteriler', ['musteriler' => $musteriler]);
    }

    public function musteriDuzenle($mtcknvno)
    {
        $musteri = musteri::where('mtcknvno', $mtcknvno)->first();

        return view('musteriBilgileriDuzenle', ['musteri' => $musteri]);
    }

    public function store(Request $request)
    {
        // Validate data
        if ($request->mkayitturu == 'Ticari') {
            $request->validate(
                [
                    'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                    'mtcknvno' => 'required|numeric',
                    'mbfirmaadi' => 'required',
                    'madres' => 'required',
                    'mbolge' => 'required',
                    'milce' => 'required|doesnt_start_with:İl',
                    'mil' => 'required|doesnt_start_with:İlçe',
                    'mtel' => 'required',
                    'menlem' => 'required',
                    'meposta' => 'email',
                ],
                [
                    'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
                    'mil.doesnt_start_with' => 'Lütfen müşterinin ilini giriniz.',
                    'milce.doesnt_start_with' => 'Lütfen müşterinin ilçesini giriniz.',
                    'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                    'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                    'mbfirmaadi.required' => 'Lütfen firma adını boş bırakmayınız.',
                    'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
                    'mbsoyadi.required' => 'Lütfen müşteri soyadını boş bırakmayınız.',
                    'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
                    'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
                    'madres.required' => 'Lütfen müşterinin adresini giriniz.',
                    'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                    'meposta.required' => 'Lütfen müşterinin eposta adresini giriniz.',
                    'mtel.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
                    'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
                ]
            );
        } else {
            $request->validate(
                [
                    'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                    'mtcknvno' => 'required|numeric',
                    'mbfirmaadi' => 'required',
                    'mbunvani' => 'string',
                    'mbadi' => 'required',
                    'mbsoyadi' => 'required',
                    'mbdogumgunu' => 'before:today',
                    'madres' => 'required',
                    'mbolge' => 'required',
                    'mil' => 'required|doesnt_start_with:İl',
                    'milce' => 'required|doesnt_start_with:İlçe',
                    'mtel' => 'required',
                    'menlem' => 'required',
                    'meposta' => 'email'
                ],
                [
                    'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
                    'mil.doesnt_start_with' => 'Lütfen müşterinin ilini giriniz.',
                    'milce.doesnt_start_with' => 'Lütfen müşterinin ilçesini giriniz.',
                    'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                    'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                    'mbfirmaadi.required' => 'Lütfen firma adını boş bırakmayınız.',
                    'mbunvani.string' => 'Lütfen müşterinin ünvanını doğru girdiğinizden emin olunuz.',
                    'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
                    'mbsoyadi.required' => 'Lütfen müşteri soyadını boş bırakmayınız.',
                    'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
                    'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
                    'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
                    'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                    'meposta.required' => 'Lütfen müşterinin eposta adresini giriniz.',
                    'mtel.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
                    'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
                    'madres.required' => 'Lütfen müşterinin adresini giriniz.',
                ]
            );
        }

        $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
        musteri::create($request->all());

        return redirect()->back()->with("success", "Kayıt Başarıyla Eklendi!");
    }

    public function musteriEkle(Request $request)
    {
        // Validate data
        // dd($request->all());
        $request->validate(
            [
                'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                'mtcknvno' => 'required|numeric',
                'mbfirmaadi' => 'required',
                'milce' => 'required|doesnt_start_with:İl',
                'mil' => 'required|doesnt_start_with:İlçe',
                'mbadi' => 'required',
                'mbsoyadi' => 'required',
                'mbolge' => 'required',
                'menlem' => 'required',
                'mtel' => 'required',
                'meposta' => 'email',
                'madres' => 'required',
            ],
            [
                'mkayitturu.doesnt_start_with' => 'Lütfen müşterinin kayıt türünü seçiniz.',
                'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                'mbfirmaadi.required' => 'Lütfen firma adını boş bırakmayınız.',
                'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
                'mbsoyadi.required' => 'Lütfen çalışan telefonunu boş bırakmayınız.',
                'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
                'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                'milce.required' => 'Lütfen ilçeyi seçiniz.',
                'milce.doesnt_start_with' => 'Lütfen ilçeyi seçiniz.',
                'mil.required' => 'Lütfen il seçiniz.',
                'mil.doesnt_start_with' => 'Lütfen il seçiniz.',
                'mtel.required' => 'Lütfen müşterinin telefon numarasını giriniz.',
                'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
                'madres.required' => 'Lütfen müşterinin adresini giriniz.',
                'mtel.requried' => 'Lütfen telefon numarası giriniz',
            ]
        );

        $musteriSayisiBul = musteri::where('id', '>', '0')->get();
        $musteriSayisi = $musteriSayisiBul->count(); // Kaç çalışan olduğunu saydırır.

        if (musteri::where('mtcknvno', $request->mtcknvno)->exists()) {
            return redirect()->back()->with('error', 'Bu TCKN/Vergi No ile kayıtlı bir müşteri bulunmaktadır.');
        } else if ($musteriSayisi > 0) { // Tablo boş değilse
            $sonmusteri = musteri::orderBy('id', 'desc')->first()->id; //Son Çalışanın Satır ID'sini getirir.
            musteri::create($request->all());
            musteri::where('mtcknvno', $request->mtcknvno)->update(array('mrefno' => 'sbe-' . $sonmusteri++ . '', 'aktif' => 1));
            return redirect()->back()->with("success", "Kayıt Başarıyla Eklendi!");
        } else { // Tablo Boşsa
            musteri::create($request->all());
            musteri::where('mtcknvno', $request->mtcknvno)->update(array('mrefno' => 'sbe-0', 'aktif' => 1));
            return redirect()->back()->with("success", "Kayıt Başarıyla Eklendi!");
        }
    }

    public function musteriGuncelle(Request $request, $mtcknvno)
    {
        $request->validate(
            [
                'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                'mtcknvno' => 'required|numeric',
                'mbfirmaadi' => 'required',
                'mbadi' => 'required',
                'mbsoyadi' => 'required',
                'mbdogumgunu' => 'before:today',
                'madres' => 'required',
                'mbolge' => 'required',
                'mtel' => 'required',
                'menlem' => 'required',
                'mboylam' => 'required',
                'milce' => 'required|doesnt_start_with:Lütfen Bir İlçe Seçiniz',
                'mil' => 'required|doesnt_start_with:Lütfen Bir İl Seçiniz',
                'meposta' => 'email',
            ],
            [
                'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                'mbfirmaadi.required' => 'Lütfen firma adını boş bırakmayınız.',
                'mbadi.required' => 'Lütfen müşteri adını boş bırakmayınız.',
                'mbsoyadi.required' => 'Lütfen çalışan soyadını boş bırakmayınız.',
                'mbdogumgunu.before' => 'Lütfen müşterinin doğum tarihini doğru girdiğinizden emin olunuz.',
                'mbolge.required' => 'Lütfen müşterinin bölgesini boş bırakmayınız.',
                'menlem.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                'mboylam.required' => 'Lütfen müşterinin konumunu haritalarda seçiniz.',
                'milce.required' => 'Lütfen ilçeyi seçiniz.',
                'milce.doesnt_start_with' => 'Lütfen ilçeyi seçiniz.',
                'mil.required' => 'Lütfen il alanını boş bırakmayınız.',
                'mil.doesnt_start_with' => 'Lütfen il alanını boş bırakmayınız.',
                'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
                'madres.required' => 'Lütfen müşterinin adresini giriniz.',
            ]
        );
        $request['mbdogumgunu'] = date('Y-m-d', strtotime($request['mbdogumgunu']));
        musteri::where('mtcknvno', $mtcknvno)->update($request->except(['_token', '_method']));

        return redirect('musteriler')->with('success', 'Kayıt Başarıyla Güncellendi');
    }

    public function musteriGuncelleProfil(Request $request, $mtcknvno)
    {
        
        $request->validate(
            [
                'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
                'mtcknvno' => 'required|numeric',
                'mbfirmaadi' => 'required',
                'mbadi' => 'required',
                'mbsoyadi' => 'required',
                'mbdogumgunu' => 'before:today',
                'madres' => 'required',
                'mbolge' => 'required',
                'menlem' => 'required',
                'mboylam' => 'required',
                'milce' => 'required|doesnt_start_with:İlçe',
                'mil' => 'required|doesnt_start_with:İl',
                'mtel' => 'required',
                'meposta' => 'email',
            ],
            [
                'mkayitturu.required' => 'Lütfen müşteri kayıt türünü seçiniz.',
                'mtcknvno.required' => 'Lütfen müşterin TCKN/Vergi No alanını boş bırakmayınız.',
                'mbfirmaadi.required' => 'Lütfen firma adını boş bırakmayınız.',
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
                'meposta.email' => 'Lütfen müşterinin eposta adresini doğru girdiğinizden emin olunuz.',
                'madres.required' => 'Lütfen müşterinin adresini giriniz.',
                'mtel.requried' => 'Lütfen telefon numarası giriniz',
            ]
        );

        musteri::where('mtcknvno', $mtcknvno)->update(array(
            'mkayitturu' => $request->mkayitturu,
            'mbfirmaadi' => $request->mbfirmaadi,
            'mbolge' => $request->mbolge,
            'menlem' => $request->menlem,
            'mboylam' => $request->mboylam,
            'milce' => $request->milce,
            'mil' => $request->mil,
            'meposta' => $request->meposta,
            'madres' => $request->madres,
            'mtel' => $request->mtel,
            'mbdogumgunu' => $request->mbdogumgunu,
        ));

        $musteri = musteri::where('mtcknvno', $mtcknvno)->first();
        session()->put('kullanici', $musteri);
        return redirect()->route('profile')->with('success', 'Kayıt Başarıyla Güncellendi');
    }

    public function musteriSil($mtcknvno)
    {
        // musteri::where('mtcknvno', $mtcknvno)->delete();
        musteri::where('mtcknvno', $mtcknvno)->update(['aktif' => 0]);

        return redirect()->back()->with("success", "Müşteri Başarıyla Silindi.");
    }
}
