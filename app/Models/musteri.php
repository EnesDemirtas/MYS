<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musteri extends Model
{
    use HasFactory;

    protected $table = 'musteriler';

    protected $fillable = [
    'mrefno',
    'mkayitturu',
    'mturu',
    'mvdairesi',
    'mtcknvno',
    'mtmarkaadi',
    'mtsubeadi',
    'mtkisaltmasi',
    'firmatamunvan',
    'mtunvandevami',
    'mtsno',
    'mosno',
    'mmmno',
    'monunvan',
    'mbadi',
    'mbsoyadi',
    'mbdogumgunu',
    'mbfirmaadi',
    'mbunvani',
    'mbankadi',
    'miban',
    'madres',
    'mbolge',
    'milce',
    'mil',
    'mtel',
    'mfaks',
    'mmobil',
    'meposta',
    'mweb',
    'menlem',
    'mboylam',
    'mnot',
    'aktif',
    'mkullaniciadi',
    'msifre',
    'maktif',
    ];
}
