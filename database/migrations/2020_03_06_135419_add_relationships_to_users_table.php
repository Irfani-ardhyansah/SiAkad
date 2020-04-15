<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreign('data_siswa_id')
                    ->references('id')->on('data_siswas')
                    ->onDelete('cascade');
                $table->foreign('data_guru_id')
                    ->references('id')->on('data_gurus')
                    ->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_data_siswa_id_foreign');
            $table->dropForeign('users_data_guru_id_foreign');
        });
    }
}
