<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyskaydiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myskaydi', function (Blueprint $table) {
            $table->string('firmakisaltmasi')->lenght(10);
            $table->string('firmamarkaadi')->lenght(50);
            $table->string('firmasubeadi')->lenght(50);
            $table->string('firmaunvandevami')->lenght(50);
            $table->string('firmatamunvan')->lenght(50);
            $table->string('fadres')->lenght(50);
            $table->string('ftel')->lenght(20);
            $table->integer('ffaks')->lenght(11);
            $table->integer('fmobil')->lenght(11);
            $table->integer('fvdairesi')->lenght(11);
            $table->integer('fvno')->lenght(11);
            $table->integer('ftsno')->lenght(11);
            $table->string('fosno')->lenght(50);
            $table->string('fmno')->lenght(50);
            $table->string('fweb')->lenght(50);
            $table->string('feposta')->lenght(50);
            $table->integer('fenlem')->lenght(50);
            $table->integer('fboylam')->lenght(50);
            $table->string('fyunvani')->lenght(50);
            $table->string('fyadi')->lenght(50);
            $table->string('fysoyadi')->lenght(50);
            $table->integer('fytckn')->lenght(20);
            $table->string('fymobil')->lenght(50);
            $table->string('fywhatsapp')->lenght(50);
            $table->string('mysrefno')->lenght(50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('myskaydi');
    }
};
