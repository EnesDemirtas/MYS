<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bakimformu extends Model
{
    use HasFactory;
    protected $table = 'bakimformlari';
    protected $fillable = [
        'form_adi',
        'sorular',
    ];
}
