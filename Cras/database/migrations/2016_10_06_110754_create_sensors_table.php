<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function(Blueprint $table)
        {
            $table -> increments('sensor_id');
            $table -> integer('processor_id') -> unsigned();
            $table -> foreign('processor_id')
                    -> references('id') -> on('processors')
                    -> onDelete('cascade');
            $table -> string('sensor_type');
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
        Schema::drop('sensors');
    }
}
