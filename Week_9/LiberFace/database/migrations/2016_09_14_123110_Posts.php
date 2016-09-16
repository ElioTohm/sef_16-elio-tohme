<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /**
     * Table post forgein key with table users on id
    */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('user_id') -> unsigned() -> default(0);
            $table -> foreign('user_id')
                   -> references('id') -> on('users')
                   -> onDelete('cascade');
            $table -> string('tags');
            $table -> text('image_url');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
