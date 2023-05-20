<?php

namespace App\Http\Controllers;
use App\Models\teklif;
use Illuminate\Http\Request;

class Teklifler extends Controller
{
    // Bütün Teklifleri Göster
    public function index()
    {
        $teklifler = teklif::All();
        return view('teklifler',compact("teklifler"));
    }
}
