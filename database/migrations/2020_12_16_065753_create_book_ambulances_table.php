<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_ambulances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('facility_name')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('date_of_transport')->nullable();
            $table->time('time_of_transport')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_ambulances');
    }
}
