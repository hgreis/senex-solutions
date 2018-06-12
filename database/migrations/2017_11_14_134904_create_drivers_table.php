<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('street')->nullable();
            $table->text('city')->nullable();
            $table->text('land')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('contractor')->nullable();
            $table->text('car_brand')->nullable();
            $table->text('number_plate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
