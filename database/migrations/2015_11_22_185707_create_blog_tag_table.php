<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('blog_tag', function (Blueprint $table) {

          $table->increments('id');
          $table->timestamps();

          # Make fields for FK
          $table->integer('blog_id')->unsigned();
          $table->integer('tag_id')->unsigned();

          # Set FK
          $table->foreign('blog_id')->references('id')->on('blogs');
          $table->foreign('tag_id')->references('id')->on('tags');
        });
     }

     public function down()
     {
        Schema::drop('blog_tag');
     }
}
