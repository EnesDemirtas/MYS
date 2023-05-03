<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;

    protected $table = 'aktivasyonkodlari';
    public $timestamps = true;
    protected $fillable = [
        'eposta',
        'aktivasyonkodu',
        'sure'
    ];
}
