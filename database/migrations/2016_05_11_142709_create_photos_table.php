<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sid',60);
            $table->string('img_name',60);
            $table->string('name',200);
            $table->string('title',200);
            $table->string('desc',200);
            $table->dateTime('created_time');
            $table->string('created_ip',120);
            $table->index(array('sid','created_time'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
