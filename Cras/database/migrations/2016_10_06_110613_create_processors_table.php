<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processors', function(Blueprint $table)
        {
            $table -> increments('processor_id');
            $table -> integer('user_id') -> unsigned();
            $table -> foreign('user_id')
                    -> references('id') -> on('users')
                    -> onDelete('cascade');
            $table -> string('processor_name');
            $table -> string('mac')->unique();
            $table -> string('auth_key') -> unique();
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
        Schema::drop('processors');
    }
}
