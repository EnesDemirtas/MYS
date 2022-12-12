<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalisanlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calisanlar', function (Blueprint $table) {
            $table->id('csatirid',11);
            $table->string('ckayitno')->length(40);
            $table->string('mysrefno')->length(40);
            $table->string('mrefno')->length(20);
            $table->string('ctckn')->length(20);
            $table->string('cadi')->length(50);
            $table->string('csoyadi')->length(40);
            $table->string('cunvani')->length(40);
            $table->date('cdogum');
            $table->date('cisegiris');
            $table->string('ukodutel')->lenght(10);
            $table->string('ctel')->length(15);
            $table->string('cevadresilce')->length(50);
            $table->string('cevadresil')->length(50);
            $table->string('ceposta')->length(50);
            $table->string('cwhatsapp')->length(50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calisanlar');
    }
};
