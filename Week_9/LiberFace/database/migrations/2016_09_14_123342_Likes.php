<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Likes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Create table comment with foreign key to user and post table
        */
        Schema::create('likes', function(Blueprint $table)
        {
            $table -> integer('likes') -> unsigned() -> default(0);
            $table -> foreign('likes')
                   -> references('id')-> on('posts')
                   -> onDelete('cascade');
            $table -> integer('from_user') -> unsigned() -> default(0);
            $table -> foreign('from_user')
                   -> references('id')->on('users')
                   -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('likes');
    }
}
