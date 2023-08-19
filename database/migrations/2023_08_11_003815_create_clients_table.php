<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('client_type_id')->unsigned();
            // $table->date('date');
            $table->integer('age');
            $table->float('weight', 8, 2);
            $table->float('height', 8, 2);
            $table->boolean('is_employee');
            $table->boolean('is_enabled');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_type_id')->references('id')->on('clients_type');
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
        Schema::table('clients', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
             $table->dropForeign(['client_type_id']);
         });

        Schema::dropIfExists('clients');
    }
}
