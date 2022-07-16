<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('role_code');
            $table->string('employee_number');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('streetAddress1');
            $table->text('streetAddress2');
            $table->text('city');
            $table->text('state');
            $table->string('phonenumber');
            $table->string('homenumber');
            $table->string('email')->unique();
            $table->string('birthday');
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('registration');
    }
}
