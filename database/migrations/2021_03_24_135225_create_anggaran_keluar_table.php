<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_keluar');
            $table->string('slug');
            $table->timestamp('waktu', $precision = 0);
            $table->string('penanggung_jawab');
            $table->unsignedBigInteger('id_site')->nullable();
            $table->timestamps();
            
            $table->foreign('id_site')->references('id')->on('site_proyek')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_keluar');
    }
}
