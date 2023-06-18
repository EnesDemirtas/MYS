<?php

namespace App\Http\Controllers;

use App\Models\teklif;
use App\Models\bakimformu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use AmrShawky\LaravelCurrency\Facade\Currency;

class Teklifler extends Controller
{
    // Bütün Teklifleri Göster
    public function index()
    {
        $teklifler_cache_result = Redis::get('teklifler');
        if (isset($teklifler_cache_result)) {
            $teklifler = json_decode($teklifler_cache_result);
        } else {
            $teklifler = teklif::all();
            Redis::set('teklifler', json_encode($teklifler));
        }
        return view('teklifler', compact("teklifler"));
    }

    public function hizmetler()
    {
        $bakimformlari = bakimformu::All();
        return view('hizmet_ve_urunler', compact("bakimformlari"));
    }

    public function teklifSil($id)
    {
        teklif::where('id', $id)->delete();
        Redis::del('teklifler');
        return redirect()->back()->with("success", "Teklif Başarıyla Silindi.");
    }

    public function teklifGozat($id)
    {
        $teklif_cache_result = Redis::get('teklif:' . $id);
        if (isset($teklif_cache_result)) {
            $teklif = json_decode($teklif_cache_result);
        } else {
            $teklif = teklif::where('id', $id)->first();
            Redis::set('teklif:' . $id, json_encode($teklif));
            Redis::del('teklifler');
        }
        return view('teklif_gozat', ['teklifler' => $teklif]);
    }

    public function teklifEkle(Request $request)
    {
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
            'yetkiliemail.email' => 'Lütfen geçerli bir E-posta girdiğinizden emin olunuz',
            'musteriadres.required' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);

        $new_teklif = teklif::create(array('teklif_veren_not' => $request->not, 'teklif_durumu' => 'Teklif Yapıldı', 'teklif_edilen_indirim' => $request->indirim_miktari_input, 'odeme_bilgileri_hesap_numarasi' => $request->hesap_numarasi, 'odeme_bilgileri_ulke_adi' => $request->ulke, 'odeme_bilgileri_swift_kodu' => $request->swift_kodu, 'odeme_bilgileri_banka_adi' => $request->banka_adi, 'istenilen_hizmet_miktar' => $request->urun_miktari1, 'istenilen_hizmet_fiyat' => $request->urun_fiyati1, 'istenilen_hizmetler' => $request->periyodik_bakim, 'teklif_baslangic_tarihi' => $request->date, 'teklif_bitis_tarihi' => $request->due, 'teklif_veren_isim' => $request->yetkiliismi, 'teklif_veren_email' => $request->yetkiliemail, 'teklif_veren_adres' => $request->musteriadres, 'teklif_veren_telefon' => $request->musteritelefon, 'teklif_veren_sirket' => $request->sirketismi));
        Redis::set('teklif:' . $new_teklif->id, json_encode($new_teklif));
        Redis::del('teklifler');
        return redirect('teklifler')->with("success", "Teklif başarıyla oluşturuldu!");
    }

    public function teklifOnizle(Request $request)
    {
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
            'yetkiliemail.email' => 'Lütfen geçerli bir E-posta girdiğinizden emin olunuz',
            'musteriadres.required' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);

        $kacDolar = Currency::convert() //CURRENCY API KULLANIMI
            ->from('USD')
            ->to('TRY')
            ->amount(50)
            ->round(2)
            ->get();

        return view('teklif_onizle', ['teklif_bitis_tarihi' => $request->teklif_bitis_tarihi, 'teklif_baslangic_tarihi' => $request->teklif_baslangic_tarihi, 'urun_miktari1' => $request->urun_miktari1, 'indirimsiz_toplam' => ($request->toplam_ucret_input + $request->indirim_miktari_input), 'urun_fiyati1' => $request->urun_fiyati1, 'periyodik_bakim' => $request->periyodik_bakim, 'swift_kodu' => $request->swift_kodu, 'ulke' => $request->ulke, 'banka_adi' => $request->banka_adi, 'hesap_numarasi' => $request->hesap_numarasi, 'toplam_ucret_input' => $request->toplam_ucret_input, 'ara_toplam_input' => $request->ara_toplam_input, 'indirim_miktari_input' => $request->indirim_miktari_input, 'yetkiliismi' => $request->yetkiliismi, 'yetkiliemail' => $request->yetkiliemail, 'musteriadres' => $request->musteriadres, 'musteritelefon' => $request->musteritelefon, 'date' => $request->date, 'due' => $request->due, 'sirketismi' => $request->sirketismi, 'not' => $request->not]);
    }

    public function teklifEkleGiris(Request $request)
    {
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
            'yetkiliemail.email' => 'Lütfen geçerli bir E-posta girdiğinizden emin olunuz',
            'musteriadres.required' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.'
        ]);


        $new_teklif = teklif::create(array('teklif_baslangic_tarihi' => $request->date, 'teklif_bitis_tarihi' => $request->due, 'teklif_veren_isim' => $request->yetkiliismi, 'teklif_veren_email' => $request->yetkiliemail, 'teklif_veren_adres' => $request->musteriadres, 'teklif_veren_telefon' => $request->musteritelefon, 'teklif_veren_sirket' => $request->sirketismi));
        Redis::set('teklif:' . $new_teklif->id, json_encode($new_teklif));
        Redis::del('teklifler');
        return redirect('giris_yap')->with("success", "Teklif başarıyla oluşturuldu!");
    }

    public function teklifOnizleGiris(Request $request)
    {
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
            'yetkiliemail.email' => 'Lütfen geçerli bir E-posta girdiğinizden emin olunuz',
            'musteriadres.required' => 'Adres boş bırakılamaz',
            'musteritelefon.required' => 'Telefon numarası boş bırakılamaz',
            'date.required' => 'Teklif tarihi boş bırakılamaz',
            'due.required' => 'Teklifin bitiş tarihi boş bırakılamaz',
            'sirketismi.required' => 'Şirket ismi boş bırakılamaz.',
        ]);

        return view('teklif_onizle_giris', ['yetkiliismi' => $request->yetkiliismi, 'yetkiliemail' => $request->yetkiliemail, 'musteriadres' => $request->musteriadres, 'musteritelefon' => $request->musteritelefon, 'date' => $request->date, 'due' => $request->due, 'sirketismi' => $request->sirketismi, 'not' => $request->not]);
    }

    public function paraCevir(Request $request)
    {
        $cevirilen = $request->cevirilen;
        $cevirilecek = $request->cevirilecek;
        $miktar = $request->miktar;

        $tutar = Currency::convert() //CURRENCY API KULLANIMI
            ->from($cevirilen)
            ->to($cevirilecek)
            ->amount($miktar)
            ->round(2)
            ->get();

        return response()->json(['tutar' => $tutar, 'cevirilen' => $cevirilen, 'cevirilecek' => $cevirilecek, 'miktar' => $miktar]);
    }

    // Giriş yaptıktan sonraki teklif ekleme sayfasını yükler, hizmetler tablosundan hizmet adlarını çeker.
    public function teklifEkleLoad()
    {
        return view('teklif_ekle', ['hizmetler' => bakimformu::all('form_adi')]);
    }
}
