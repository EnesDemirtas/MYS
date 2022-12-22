<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musteri;

class MusterilerController extends Controller {
    // Show all musteriler
    public function index()
    {
        return view('musteriler', ['musteriler' => musteri::all()]);
    }
}