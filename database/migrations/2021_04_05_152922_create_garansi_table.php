<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaransiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garansi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pesanan')->unsigned();
            $table->foreign('id_pesanan')->references('id')->on('pesanan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->longText('garansi');
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
        Schema::dropIfExists('garansi');
    }
}
