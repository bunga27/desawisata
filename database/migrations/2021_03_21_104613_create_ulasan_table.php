<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->increments('id_ulasan');
            $table->integer('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id_wisata')->on('wisata')->onUpdate('cascade');
            $table->string('nama_penulis');
            $table->string('email_penulis');
            $table->string('ulasan');
            $table->unsignedDecimal('nilai');
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
        Schema::dropIfExists('ulasan');
    }
}
