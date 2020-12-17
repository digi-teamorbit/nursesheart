<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_signups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('phone')->nullable();
            $table->string('insurance_company_name')->nullable();
            $table->string('insurance_number')->nullable();
            $table->string('group_number')->nullable();
            $table->string('insurance_card')->nullable();
            $table->string('driver_liscence')->nullable();
            $table->string('ssn')->nullable();
            $table->string('type')->nullable();
            $table->string('state_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_signups');
    }
}
