<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRattingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jasa')->unsigned();
            $table->foreign('id_jasa')->references('id')->on('jasa')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customer')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_pesanan')->unsigned();
            $table->foreign('id_pesanan')->references('id')->on('pesanan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('ratting');
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
        Schema::dropIfExists('ratting');
    }
}
