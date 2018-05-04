<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('startDatum')->nullable();
            $table->text('startName')->nullable();
            $table->text('startStrasse')->nullable();
            $table->text('startOrt')->nullable();
            $table->text('startLand')->nullable();
            $table->text('startBemerkung')->nullable();
            $table->date('zielDatum')->nullable();
            $table->text('zielName')->nullable();
            $table->text('zielStrasse')->nullable();
            $table->text('zielOrt')->nullable();
            $table->text('zielLand')->nullable();
            $table->text('zielBemerkung')->nullable();
            $table->float('preisFahrer')->nullable();
            $table->float('preisKunde')->nullable();
            $table->text('fahrer')->nullable();
            $table->text('kunde')->nullable();
            $table->text('kundeBemerkung')->nullable();
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
        Schema::dropIfExists('missions');
    }
}