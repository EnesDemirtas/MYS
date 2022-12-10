<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onmuhasebe extends Model
{
    use HasFactory;

    protected $fillable = [
        'mrefno',
        'onkno',
        'onkturu',
        'onvakit',
        'onmarkaadi',
        'krefno',
        'ontckn',
        'onadsoyadi',
        'ongorevi',
    ];
}
