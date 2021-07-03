<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mitra')->unsigned();
            $table->foreign('id_mitra')->references('id')->on('mitra')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategori')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama');
            $table->string('gambar');
            $table->integer('harga');
            $table->boolean('ratting');
            $table->longText('deskripsi');
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
        Schema::dropIfExists('jasa');
    }
}
