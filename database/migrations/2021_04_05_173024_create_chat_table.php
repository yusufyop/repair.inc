<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customer')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin')->references('id')->on('admin')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('status');
            $table->longText('pesan');
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
        Schema::dropIfExists('chat');
    }
}
