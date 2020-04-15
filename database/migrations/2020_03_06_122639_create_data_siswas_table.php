<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alamat', 100);
            $table->string('tempat_lahir', 70);
            $table->string('tanggal_lahir', 20);
            $table->integer('no_hp');
            $table->string('nama_ortu_wali', 50);
            $table->string('tanggal_ortu_wali', 70);
            $table->string('alamat_ortu', 100);
            $table->integer('no_hp_ortu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_siswas');
    }
}
