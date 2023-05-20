<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teklif extends Model
{
    use HasFactory;
    protected $table = 'teklifler';
    protected $fillable = [
        'teklif_baslangic_tarihi',
        'teklif_bitis_tarihi',
        'islemsaati',
        'teklif_veren_isim',
        'teklif_veren_email',
        'teklif_veren_adres',
        'teklif_veren_telefon',
        'teklif_veren_not',
        'istenilen_hizmetler',
        'istenilen_hizmet_fiyat',
        'istenilen_hizmet_miktar',
    ];
}
