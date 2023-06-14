<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bakimformusonucu extends Model
{
    use HasFactory;
    protected $table = 'bakimformusonuclari';
    protected $fillable = [
        'form_adi',
        'teklif_id',
        'kurum_adi',
        'faaliyet_alani',
        'adres',
        'telefon',
        'eposta',
        'tarih',
        'ozel_bilgiler',
        'teknik_bilgiler',
        'kullanilan_metod',
        'olcum_cihazi',
        'marka_model',
        'seri_no',
        'cevaplar',
        'ikaz_oneriler',
        'sonuc_kanaat',
        'sonraki_bakim_tarihi',
        'kontrol_yapan_tckn',
        'kontrol_yapan_adsoyad',
        'kontrol_yapan_meslek',
        'kontrol_yapan_diploma_tarihi_no',
        'kurum_yetkilisi_tckn',
        'kurum_yetkilisi_adsoyad',
        'kurum_yetkilisi_unvan',
    ];
}
