<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personil', function (Blueprint $table) {
            $table->id('id');
            $table->string('personel');
            $table->string('slug');
            $table->string('jumlah');
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
        Schema::dropIfExists('personil');
    }
}
