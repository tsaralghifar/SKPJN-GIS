<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewaalats', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_alat');
            $table->string('slug');
            $table->date('tanggal_sewa');
            $table->string('keperluan');
            $table->integer('biaya_sewa');
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
        Schema::dropIfExists('sewaalats');
    }
}
