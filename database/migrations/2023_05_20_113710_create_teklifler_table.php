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
        Schema::create('teklifler', function (Blueprint $table) {
            $table->id();
            $table->date('teklif_baslangic_tarihi');
            $table->date('teklif_bitis_tarihi');
            $table->timestamp('islemsaati');
            $table->string('teklif_veren_isim')->length(25);
            $table->string('teklif_veren_email')->length(50);
            $table->string('teklif_veren_adres')->length(100);
            $table->string('teklif_veren_telefon')->length(25);
            $table->string('teklif_veren_not')->length(255);
            $table->string('istenilen_hizmetler')->lenght(255);
            $table->string('istenilen_hizmet_fiyat')->lenght(5);
            $table->string('istenilen_hizmet_miktar')->lenght(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teklifler');
    }
};
