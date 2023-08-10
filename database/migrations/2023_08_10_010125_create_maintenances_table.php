<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gadgets_id')->unsigned();
            $table->date('date');
            $table->integer('interval');
            $table->boolean('is_enabled');
            $table->foreign('gadgets_id')->references('id')->on('gadgets');
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
        Schema::table('maintenances', function (Blueprint $table) {
            $table->dropForeign(['gadgets_id']);
        });

        Schema::dropIfExists('maintenances');
    }
}
