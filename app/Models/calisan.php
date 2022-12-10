<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mysrefno',
        'ctckn',
        'cadi',
        'csoyadi',
        'cunvani',
        'cdogum',
        'cisegiris',
        'ckodutel',
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
