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
