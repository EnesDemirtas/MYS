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
            $table->string('ctckn')->nullable()->change();
            $table->string('cadi')->nullable()->change();
            $table->string('csoyadi')->nullable()->change();
            $table->string('cunvani')->nullable()->change();
            $table->date('cdogum')->nullable()->change();
            $table->date('cisegiris')->nullable()->change();
            $table->string('ukodutel')->nullable()->change();
            $table->string('ctel')->nullable()->change();
            $table->string('cevadresilce')->nullable()->change();
            $table->string('cevadresil')->nullable()->change();
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
