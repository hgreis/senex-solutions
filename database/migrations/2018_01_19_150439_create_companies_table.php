<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nameCompany')->nullable();
            $table->text('nameOwner')->nullable();
            $table->text('street')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('phone')->nullable();
            $table->text('cellphone')->nullable();
            $table->text('email')->nullable();
            $table->text('url')->nullable();
            $table->text('taxNumber')->nullable();
            $table->text('venue')->nullable();
            $table->text('bank')->nullable();
            $table->text('iban')->nullable();
            $table->text('bic')->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
