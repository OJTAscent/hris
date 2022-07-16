<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('registration')->onUpdate('cascade')->onDelete('cascade');    
            $table->string('contact_firstname');
            $table->string('contact_lastname');
            $table->string('contact_phonenumber');
            $table->string('relationship');
            $table->string('secondcontact_fname');
            $table->string('secondcontact_lname');
            $table->string('second_phonenumber');
            $table->string('second_relationship');
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
        Schema::dropIfExists('emergencies');
    }
}
