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
        Schema::create('rws', function (Blueprint $table) {
            $table->id();
            $table->string('penasehat');
            $table->string('ketuarw');
            $table->string('ketuart1');
            $table->string('ketuart2');
            $table->string('ketuart3');
            $table->string('ketuart4');
            $table->string('bendahara');
            $table->string('sekretaris');
            $table->string('rohani');
            $table->string('humas');
            $table->string('pembangunan');
            $table->string('pemudadanolahraga');
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
        Schema::dropIfExists('rws');
    }
};
