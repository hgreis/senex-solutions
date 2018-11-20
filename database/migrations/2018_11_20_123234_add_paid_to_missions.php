<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToMissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->timestamp('bill_paid')->after('bill_id')->nullable();
            $table->integer('credit')->after('bill_paid')->nullable();
            $table->timestamp('credit_paid')->after('credit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->dropColumn('bill_paid');
            $table->dropColumn('credit');
            $table->dropColumn('credit_paid');
        });
    }
}
