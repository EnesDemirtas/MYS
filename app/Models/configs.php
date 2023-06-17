<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class configs extends Model
{
    use HasFactory;
    protected $table = 'configs';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'value'
    ];
}
