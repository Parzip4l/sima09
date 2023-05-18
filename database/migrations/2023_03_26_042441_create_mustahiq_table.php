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
        Schema::create('mustahiq', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->date('tanggal_diberikan');
            $table->float('jumlah_zakat');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('mustahiq');
    }
};
