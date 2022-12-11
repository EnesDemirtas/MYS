<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;
use Illuminate\Validation\Rule;

class CalisanlarController extends Controller
{
    // Show all calisanlar
    public function index()
    {
        return view('calisanlar', [
            'calisanlar' => calisan::all()
        ]);
    }
}
