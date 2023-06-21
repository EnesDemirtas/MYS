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
            $table->id('id', 11);
            $table->string('mkayitturu')->lenght(20);
            $table->string('mturu')->lenght(20)->nullable();
            $table->string('mvdairesi')->lenght(50)->nullable();
            $table->string('mtcknvno')->lenght(20)->nullable();
            $table->string('mbadi')->lenght(20)->nullable();
            $table->string('mbsoyadi')->lenght(20)->nullable();
            $table->date('mbdogumgunu')->nullable()->nullable();
            $table->string('mbfirmaadi')->lenght(50)->nullable();
            $table->string('mbunvani')->lenght(20)->nullable();
            $table->string('mbankadi')->lenght(20)->nullable();
            $table->string('miban')->lenght(20)->nullable();
            $table->string('madres')->lenght(20)->nullable();
            $table->string('mbolge')->lenght(20)->nullable();
            $table->string('milce')->lenght(20)->nullable();
            $table->string('mil')->lenght(20)->nullable();
            $table->string('mtel')->lenght(20)->nullable();
            $table->string('mfaks')->lenght(20)->nullable();
            $table->string('meposta')->lenght(20)->nullable();
            $table->string('mweb')->lenght(20)->nullable();
            $table->string('menlem')->lenght(20)->nullable();
            $table->string('mboylam')->lenght(20)->nullable();
            $table->string('mnot')->lenght(20)->nullable();
            $table->string('mkullaniciadi')->lenght(20)->nullable();
            $table->string('msifre')->lenght(255)->nullable();
            $table->string('maktif')->lenght(5)->nullable();
            $table->string('mphoto')->lenght(100)->nullable();
            $table->date('updated_at');
            $table->date('created_at');
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
