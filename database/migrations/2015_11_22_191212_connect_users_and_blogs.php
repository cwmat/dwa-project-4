<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndBlogs extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            # Add field to become FK for users
            $table->integer('user_id')->unsigned();

            # Make user_id a FK for users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {

            # http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + FK field name + the word "foreign" - weird...
            $table->dropForeign('blogs_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
