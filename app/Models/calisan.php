<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calisan extends Model
{
    use HasFactory;

    protected $table = 'calisanlar';

    protected $fillable = [
        'mysrefno',
        'ckayitno',
        'ctckn',
        'cadi',
        'csoyadi',
        'cunvani',
        'cdogum',
        'cisegiris',
        'ukodutel',
        'ctel',
        'ukodumob',
        'cmobil',
        'cevadres',
        'cevadresilce',
        'cevadresil',
        'ceposta',
        'cwhatsapp',
    ];
}
