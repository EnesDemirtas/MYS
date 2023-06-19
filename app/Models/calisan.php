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
        'ckullaniciadi',
        'csifre',
        'cyetki',
        'cadi',
        'csoyadi',
        'cunvani',
        'cdogum',
        'cisegiris',
        'ctel',
        'cevadresilce',
        'cevadresil',
        'ceposta',
        'cwhatsapp',
        'cphoto',
        'caktif',
    ];
}
