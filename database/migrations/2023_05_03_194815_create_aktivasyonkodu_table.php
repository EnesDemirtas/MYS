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
        Schema::create('aktivasyonkodu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('eposta')->length(50)->nullable();
            $table->string('aktivasyonkodu')->length(32)->nullable();
            $table->dateTime('sure')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktivasyonkodu');
    }
};
