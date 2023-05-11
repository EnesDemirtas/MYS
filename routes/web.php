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


Route::get('/', [AnasayfaController::class, 'allData'])->name('anasayfa.index')->middleware('isAuthenticated');

Route::get('/musteriler', [MusterilerController::class, 'index'])->name('musteriler')->middleware('isAuthenticated');
Route::post('/musteriler', [MusterilerController::class, 'store'])->name('musteri.hizlikayit')->middleware('isAuthenticated');
Route::post('/musteri', [MusterilerController::class, 'musteriEkle'])->name('musteri.ekle')->middleware('isAuthenticated');
Route::get('/musteri/{mtcknvno}', [MusterilerController::class, 'musteriDuzenle'])->name('musteri.duzenle')->middleware('isAuthenticated');
Route::put('/musteri/{mtcknvno}', [MusterilerController::class, 'musteriGuncelle'])->name('musteri.guncelle')->middleware('isAuthenticated');
Route::delete('/musteri/{mtcknvno}',[MusterilerController::class, 'musteriSil'])->name('musteri.sil')->middleware('isAuthenticated');


Route::get('/musteri_ekle', function () {
    return view('musteri_ekle');
})->middleware('isAuthenticated');

Route::get('randevu_yonetimi', function () {
    return view('randevu_yonetimi');
})->middleware('isAuthenticated');

Route::get('gorev_yonetimi', function () {
    return view('gorev_yonetimi');
})->middleware('isAuthenticated');

Route::get('calisan_ekle', function () {
    return view('calisan_ekle');
})->middleware('isAuthenticated');

Route::post('/calisan', [CalisanlarController::class,'calisanEkle'])->name('calisan.ekle')->middleware('isAuthenticated');
Route::get('/calisan/{ctckn}', [CalisanlarController::class, 'calisanDuzenle'])->name('calisan.duzenle')->middleware('isAuthenticated');
Route::put('/calisan/{ctckn}', [CalisanlarController::class, 'calisanGuncelle'])->name('calisan.guncelle')->middleware('isAuthenticated');
Route::delete('/calisan/{ctckn}',[CalisanlarController::class, 'calisanSil'])->name('calisan.sil')->middleware('isAuthenticated');
Route::get('calisanlar', [CalisanlarController::class, 'index'])->name('calisan.index')->middleware('isAuthenticated');

Route::get('teklif_yonetimi', function () {
    return view('teklif_yonetimi');
})->middleware('isAuthenticated');

Route::get('teklif_ekle', function () {
    return view('teklif_ekle');
})->middleware('isAuthenticated');

Route::get('teklif_duzenle', function () {
    return view('teklif_duzenle');
})->middleware('isAuthenticated');

Route::get('teklifler', function () {
    return view('teklifler');
})->middleware('isAuthenticated');

Route::get('teklif_onizle', function () {
    return view('teklif_onizle');
})->middleware('isAuthenticated');

Route::get('sifre_yenileme', function () {
    return view('sifre_yenileme');
});

Route::get('on_muhasebe', function () {
    return view('on_muhasebe');
})->middleware('isAuthenticated');

Route::get('kayit_ol', function () {
    return view('kayit_ol');
});

Route::get('hizmet_ve_urunler', function () {
    return view('hizmet_ve_urunler');
})->middleware('isAuthenticated');

Route::get('musteri/giris_yap', function () {
    return view('musteri_giris_yap');
});

Route::get('giris_yap', function () {
    return view('firma_giris_yap');
})->name('giris_yap');

Route::post('giris_yap', [UserController::class, 'login'])->name('login');

Route::post('cikis_yap', [UserController::class, 'logout'])->name('logout')->middleware('isAuthenticated');

Route::post('kayit_ol', [UserController::class, 'register'])->name('register');

Route::get('profile', [UserController::class, 'GetProfile'])->name('profile');
Route::post('uploadPP', [UserController::class, 'UploadPP'])->name('uploadPP');

Route::post('reset_activation_code', [UserController::class, 'SendResetActivationCode'])->name('reset_activation_code');
Route::get('new_password', [UserController::class, 'GetNewPassword'])->name('get_new_password');
Route::post('new_password', [UserController::class, 'NewPassword'])->name('new_password');