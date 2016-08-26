<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('author');
            $table->string('isbn');
            $table->integer('quantities');
            $table->string('location');
            $table->string('image_url');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('books');
    }
}
