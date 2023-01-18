<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalisanlarController;
use App\Http\Controllers\MusterilerController;
use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AnasayfaController::class, 'allData'])->name('anasayfa.index');

Route::get('/musteriler', [MusterilerController::class, 'index']);
Route::post('/musteriler', [MusterilerController::class, 'store'])->name('musteri.hizlikayit');
Route::post('/musteri', [MusterilerController::class, 'musteriEkle'])->name('musteri.ekle');
Route::get('/musteri/{mtcknvno}', [MusterilerController::class, 'musteriDuzenle'])->name('musteri.duzenle');
Route::put('/musteri/{mtcknvno}', [MusterilerController::class, 'musteriGuncelle'])->name('musteri.guncelle');
Route::delete('/musteri/{mtcknvno}',[MusterilerController::class, 'musteriSil'])->name('musteri.sil');


Route::get('/musteri_ekle', function () {
    return view('musteri_ekle');
});

Route::get('randevu_yonetimi', function () {
    return view('randevu_yonetimi');
});

Route::get('gorev_yonetimi', function () {
    return view('gorev_yonetimi');
});

Route::get('calisan_ekle', function () {
    return view('calisan_ekle');
});

Route::post('/calisan', [CalisanlarController::class,'calisanEkle'])->name('calisan.ekle');
Route::get('/calisan/{ctckn}', [CalisanlarController::class, 'calisanDuzenle'])->name('calisan.duzenle');
Route::put('/calisan/{ctckn}', [CalisanlarController::class, 'calisanGuncelle'])->name('calisan.guncelle');
Route::delete('/calisan/{ctckn}',[CalisanlarController::class, 'calisanSil'])->name('calisan.sil');
Route::get('calisanlar', [CalisanlarController::class, 'index'])->name('calisan.index');

Route::get('teklif_yonetimi', function () {
    return view('teklif_yonetimi');
});

Route::get('teklif_ekle', function () {
    return view('teklif_ekle');
});

Route::get('teklif_duzenle', function () {
    return view('teklif_duzenle');
});

Route::get('teklifler', function () {
    return view('teklifler');
});

Route::get('teklif_onizle', function () {
    return view('teklif_onizle');
});

Route::get('sifre_yenileme', function () {
    return view('sifre_yenileme');
});

Route::get('on_muhasebe', function () {
    return view('on_muhasebe');
});

Route::get('kayit_ol', function () {
    return view('kayit_ol');
});

Route::get('hizmet_ve_urunler', function () {
    return view('hizmet_ve_urunler');
});

Route::get('musteri/giris_yap', function () {
    return view('musteri_giris_yap');
});

Route::get('giris_yap', function () {
    return view('firma_giris_yap');
});

Route::post('giris_yap', [UserController::class, 'login'])->name('login');

