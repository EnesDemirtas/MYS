<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnmuhasebeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onmuhasebe', function (Blueprint $table) {
            $table->id('satirid',11);
            $table->string('mrefno')->lenght(20);
            $table->integer('onkno')->lenght(11);
            $table->string('onkturu')->lenght(40);
            $table->date('onvakit');
            $table->string('onmarkaadi')->lenght(40);
            $table->integer('krefno')->lenght(20);
            $table->string('ontckn')->lenght(20);
            $table->string('onadisoyadi')->lenght(50);
            $table->string('ongorevi')->lenght(20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onmuhasebe');
    }
};
