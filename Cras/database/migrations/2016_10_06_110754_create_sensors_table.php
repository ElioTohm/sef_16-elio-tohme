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
            $table -> increments('sensors_id');
            $table -> integer('processor') -> unsigned();
            $table -> foreign('processor')
                    -> references('processor_id') -> on('processors')
                    -> onDelete('cascade');
            $table -> string('sensor_type');
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
        Schema::drop('sensors');
    }
}
