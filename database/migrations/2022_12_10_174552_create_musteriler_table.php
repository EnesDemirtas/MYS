<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musteriler', function (Blueprint $table) {
            $table->id('satirid',11);
            $table->integer('mno')->lenght(11);
            $table->string('mrefno')->lenght(20);
            $table->string('mkayitturu')->lenght(20);
            $table->string('mturu')->lenght(20);
            $table->string('mvdairesi')->lenght(50);
            $table->string('mtcknvno')->lenght(20);
            $table->string('mtmarkaadi')->lenght(50);
            $table->string('mtsubeadi')->lenght(50);
            $table->string('mtkisaltmasi')->lenght(20);
            $table->string('firmatamunvan')->lenght(20);
            $table->string('mtunvandevami')->lenght(50);
            $table->string('mtsno')->lenght(20);
            $table->string('mosno')->lenght(20);
            $table->string('mmno')->lenght(20);
            $table->string('monunvan')->lenght(20);
            $table->string('mbadi')->lenght(20);
            $table->string('mbsoyadi')->lenght(20);
            $table->date('mbdogumgunu');
            $table->string('mbfirmaadi')->lenght(50);
            $table->string('mbunvani')->lenght(20);
            $table->string('mbankadi')->lenght(20);
            $table->string('miban')->lenght(20);
            $table->string('madres')->lenght(20);
            $table->string('mbolge')->lenght(20);
            $table->string('milce')->lenght(20);
            $table->string('mil')->lenght(20);
            $table->string('mtel')->lenght(20);
            $table->string('mfaks')->lenght(20);
            $table->string('mmobil')->lenght(20);
            $table->string('meposta')->lenght(20);
            $table->string('mweb')->lenght(20);
            $table->string('menlem')->lenght(20);
            $table->string('mboylam')->lenght(20);
            $table->string('mnot')->lenght(20);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musteriler');
    }
};