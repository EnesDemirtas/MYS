<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calisan;
use App\Models\musteri;
use Illuminate\Support\Facades\Redis;


class AnasayfaController extends Controller
{
    public function allData()
    {
        $calisanlar_cache_result = Redis::get('calisanlar');
        if (isset($calisanlar_cache_result)) {
            $calisanlar = json_decode($calisanlar_cache_result, true);
        } else {
            $calisanlar = calisan::all();
            Redis::set('calisanlar', json_encode($calisanlar));
        }

        $musteriler_cache_result = Redis::get('musteriler');
        if (isset($musteriler_cache_result)) {
            $musteriler = json_decode($musteriler_cache_result, true);
        } else {
            $musteriler = musteri::all();
            Redis::set('musteriler', json_encode($musteriler));
        }

        return view('mys_index', compact('calisanlar', 'musteriler'));
    }
}
