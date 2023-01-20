<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;
use App\Models\musteri;

class AnasayfaController extends Controller
{
    public function allData() 
    { 
	$calisanlar = calisan::all(); 
	$musteriler = musteri::all();
 
	return view('mys_index',compact('calisanlar','musteriler')); 
    }


}