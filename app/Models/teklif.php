<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teklif extends Model
{
    use HasFactory;
    protected $table = 'teklifler';
    protected $fillable = [
        'musteriid',
        'teklif_veren_sirket',
        'teklif_baslangic_tarihi',
        'teklif_bitis_tarihi',
        'updated_at',
        'created_at',
        'teklif_veren_isim',
        'teklif_veren_email',
        'teklif_veren_adres',
        'teklif_veren_telefon',
        'teklif_veren_not',
        'istenilen_hizmetler',
        'istenilen_hizmet_fiyat',
        'istenilen_hizmet_miktar',
        'teklif_edilen_indirim',
        'odeme_bilgileri_banka_adi',
        'odeme_bilgileri_swift_kodu',
        'odeme_bilgileri_hesap_numarasi',
        'odeme_bilgileri_ulke_adi',
        'teklif_durumu'
    ];
}
