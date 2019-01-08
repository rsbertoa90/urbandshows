<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_songs', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('song_id')->unsigned();
            $table->integer('set_id')->unsigned();
            $table->foreign('song_id')->references('id')
                    ->on('songs')->onDelete('cascade');
            $table->foreign('set_id')->references('id')
                    ->on('sets')->onDelete('cascade');
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
        Schema::dropIfExists('set_songs');
    }
}
