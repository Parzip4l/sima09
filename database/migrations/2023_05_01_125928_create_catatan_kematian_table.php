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
        Schema::create('catatan_kematian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warga_id')->after('id');
            $table->foreign('warga_id')->references('id')->on('users');
            $table->string('nik',17)->unique();
            $table->string('nokk');
            $table->string('nama');
            $table->string('jk');
            $table->string('tanggallahir');
            $table->string('agama');
            $table->string('rt');
            $table->string('rw');
            $table->string('tanggalmeninggal');
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
        Schema::table('catatan_kematian', function (Blueprint $table) {
            $table->dropForeign(['warga_id']);
            $table->dropColumn('warga_id');
        });
    }
};
