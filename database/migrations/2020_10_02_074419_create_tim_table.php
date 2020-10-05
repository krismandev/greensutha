<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim', function (Blueprint $table) {
          $table->smallIncrements('id');
          $table->bigInteger('user_id')->unsigned();
          $table->string('foto')->nullable();
          $table->string('posisi')->nullable();
          $table->text('deskripsi')->nullable();
          $table->string('yt')->nullable();
          $table->string('fb')->nullable();
          $table->string('twitter')->nullable();
          $table->string('ig')->nullable();
          $table->string('li')->nullable();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim');
    }
}
