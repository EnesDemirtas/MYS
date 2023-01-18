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
        Schema::table('calisanlar', function (Blueprint $table) {
            $table->string('ckullaniciadi')->length(25)->nullable();
            $table->string('csifre')->length(32)->nullable();
            $table->boolean('csistemkullanicisimi')->default(false)->nullable();
            $table->integer('cyetki')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
