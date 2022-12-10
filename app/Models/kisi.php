<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mrefno',
        'kno',
        'krefno',
        'ktckn',
        'kadi',
        'ksoyadi',
        'kdogum',
        'kunvani',
        'kadresi',
        'ktel',
        'kmobilis',
        'kmobilozel',
        'kwhatsapp',
        'keposta',
        'mfirmasubeadi',
        'mtmarkaadi',
        'mtsubeadi',
        'mtcknvno',
        'firmatamunvan',
        'mtunvandevami',
        'ketiket',
        'knot',
    ];

}
