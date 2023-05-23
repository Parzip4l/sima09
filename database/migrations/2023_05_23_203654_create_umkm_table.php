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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('nama_pemilik');
            $table->string('nomorhp');
            $table->string('alamat');
            $table->string('deskripsi');
            $table->string('jenis_toko');
            $table->string('website');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('gojek');
            $table->string('shopee');
            $table->string('grab');
            $table->string('whatsapp');
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
        Schema::dropIfExists('umkm');
    }
};
