<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myskaydi extends Model
{
    use HasFactory;

    protected $fillable = [
        'firmano',
        'firmakisaltmasi',
        'firmamarkaadi',
        'firmasubeadi',
        'firmaunvandevami',
        'firmatamunvan',
        'fadres',
        'ftel',
        'ffaks',
        'fmobil',
        'fvdairesi',
        'fvno',
        'ftsno',
        'fosno',
        'fmno',
        'fweb',
        'feposta',
        'fenlem',
        'fboylam',
        'fyunvani',
        'fyadi',
        'fysoyadi',
        'fytckn',
        'fymobil',
        'fywhatsapp',
        'mysrefno',
    ];
}
