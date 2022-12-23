<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calisan extends Model
{
    use HasFactory;

    protected $table = 'calisanlar';
    public $timestamps = false;
    protected $primaryKey = 'mysrefno';
    protected $fillable = [
        'mysrefno',
        'ctckn',
        'cadi',
        'csoyadi',
        'cunvani',
        'cdogum',
        'cisegiris',
        'ukodutel',
        'ctel',
        'cevadresilce',
        'cevadresil',
        'ceposta',
        'cwhatsapp',
    ];
}
