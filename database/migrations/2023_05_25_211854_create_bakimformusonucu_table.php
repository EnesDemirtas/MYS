<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bakimformusonuclari', function (Blueprint $table) {
            $table->id();
            $table->string('form_adi')->length(255);
            $table->string('kurum_adi')->length(255);
            $table->string('faaliyet_alani')->length(255);
            $table->text('adres');
            $table->string('telefon')->length(20);
            $table->string('eposta')->length(50);
            $table->date('tarih');
            $table->text('ozel_bilgiler');
            $table->text('teknik_bilgiler');
            $table->string('kullanilan_metod')->length(255);
            $table->string('olcum_cihazi')->length(255);
            $table->string('marka_model')->length(255);
            $table->string('seri_no')->length(255);
            $table->text('cevaplar');
            $table->text('ikaz_oneriler');
            $table->text('sonuc_kanaat');
            $table->date('sonraki_bakim_tarihi');
            $table->string('kontrol_yapan_tckn')->length(11);
            $table->string('kontrol_yapan_adsoyad')->length(100);
            $table->string('kontrol_yapan_meslek')->length(100);
            $table->string('kontrol_yapan_diploma_tarihi_no')->length(50);
            $table->string('kurum_yetkilisi_tckn')->length(11);
            $table->string('kurum_yetkilisi_adsoyad')->length(100);
            $table->string('kurum_yetkilisi_unvan')->length(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bakimformusonuclari');
    }
};
