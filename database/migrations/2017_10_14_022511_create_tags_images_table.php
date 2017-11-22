<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTag');
            $table->integer('idImg');
            $table->integer('idUser')->unsigned();
            $table->timestamps();
        });
         Schema::table('tags_images', function($table) {
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_images');
    }
}
