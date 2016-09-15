<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
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
        Schema::create('comments', function(Blueprint $table)
        {
            $table -> increments('id');
            $table -> integer('on_post') -> unsigned() -> default(0);
            $table -> foreign('on_post')
                   -> references('id')-> on('posts')
                   -> onDelete('cascade');
            $table -> integer('from_user') -> unsigned() -> default(0);
            $table -> foreign('from_user')
                   -> references('id')->on('users')
                   -> onDelete('cascade');
            $table -> text('comment_text');
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
        Schema::drop('comments');
    }
}
