<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKisilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kisiler', function (Blueprint $table) {
            $table->id('satirid',11);
            $table->string('mrefno')->length(40);
            $table->string('kno')->length(20);
            $table->string('krefno')->length(20);
            $table->string('tckn')->length(20);
            $table->string('kadi')->length(50);
            $table->string('ksoyadi')->length(40);
            $table->date('kdogum')->length(100);
            $table->string('kunvani')->length(50);
            $table->string('kadresi')->length(140);
            $table->string('ktel')->length(20);
            $table->string('kmobilis')->length(20);
            $table->string('kwhatsapp')->length(40);
            $table->string('keposta')->length(100);
            $table->string('mtmarkaadi')->length(100);
            $table->string('mtsubeadi')->length(100);
            $table->string('mtcknvno')->length(20);
            $table->string('firmatamunvan')->length(100);
            $table->string('ketiket')->length(50);
            $table->string('knot')->length(255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kisiler');
    }
};
