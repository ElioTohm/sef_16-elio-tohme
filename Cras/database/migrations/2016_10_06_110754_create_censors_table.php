<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censors', function(Blueprint $table)
        {
            $table -> increments('censors_id');
            $table -> integer('processors_id') -> unsigned();
            $table -> foreign('processors_id')
                    -> references('processors_id') -> on('processors')
                    -> onDelete('cascade');
            $table -> string('type');
            $table -> string('calibration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('censors');
    }
}
