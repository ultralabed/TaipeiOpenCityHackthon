<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarbageboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garbageboxes',function(Blueprint $table){
            $table->increments('id');
            $table->string('area');
            $table->string('road');
            $table->string('note');
            $table->decimal('lon',11,8);
            $table->decimal('lat',10,8);
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
        Schema::drop('garbageboxes');
    }
}
