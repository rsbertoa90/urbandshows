<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')
                   ->references('id')->on('cities');
            $table->string('address')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->integer('set_id')->unsigned()->nullable();
            $table->foreign('set_id')
                    ->references('id')->on('sets');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')
                    ->references('id')->on('clients');
            $table->integer('price')->unsigned()->nullable();
            $table->integer('payd')->unsigned()->nullable();
            $table->text('message');
          
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
        Schema::dropIfExists('events');
    }
}
