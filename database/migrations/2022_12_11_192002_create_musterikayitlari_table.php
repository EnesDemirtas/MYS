<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterikayitlariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musterikayitlari', function (Blueprint $table) {
            $table->string('mrefno')->lenght(20);
            $table->string('islemturu')->lenght(20);
            $table->date('islemtarihi');
            $table->timestamp('islemsaati');
            $table->string('islemaciklamasi')->lenght(50);
            $table->integer('periyodikmi')->lenght(1);
            $table->integer('periyodsuresiay')->lenght(11);
            $table->date('yenihizmet');
            $table->string('urunadi')->lenght(50);
            $table->string('markamodel')->lenght(50);
            $table->date('garantibasladi');
            $table->integer('garantisuresi')->lenght(11);
            $table->date('garantibitis');
            $table->string('notlar')->lenght(255);
            $table->string('resim')->lenght(255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musterikayitlari');
    }
};
