<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musterikayit extends Model
{
    use HasFactory;

    protected $fillable = [
        'mrefno',
        'islemturu',
        'islemtarihi',
        'islemsaati',
        'islemaciklamasi',
        'periyodikmi',
        'periyodsuresiay',
        'yenihizmet',
        'urunadi',
        'markamodel',
        'garantibasladi',
        'garantisuresi',
        'garantibitis',
        'notlar',
        'resim',
    ];
}
