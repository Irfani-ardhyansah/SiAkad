<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->foreign('mapel_id')
                ->references('id')->on('mapels')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('kelas_id')
                ->references('id')->on('kelas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropForeign('jadwals_mapel_id_foreign');
            $table->dropForeign('jadwals_kelas_id_foreign');
        });
    }
}
