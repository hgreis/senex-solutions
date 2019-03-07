<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechnungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechnungs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->nullable();
            $table->integer('priceNet')->nullable();
            $table->integer('priceGross')->nullable();
            $table->integer('doc')->nullable();
            $table->text('customer')->nullable();
            $table->integer('company')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('paid')->nullable();
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
        Schema::dropIfExists('rechnungs');
    }
}
