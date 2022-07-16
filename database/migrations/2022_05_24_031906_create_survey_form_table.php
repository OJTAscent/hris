<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->text('firstname');
            $table->text('lastname');
            $table->text('streetAdd1');
            $table->text('streetAdd2');
            $table->text('city');
            $table->text('province');
            $table->integer('postal');
            $table->text('country');
            $table->string('contactNumber');
            $table->string('email');
            $table->text('exampleFormControlTextarea1');
            $table->text('exampleFormControlTextarea2');
            $table->text('exampleFormControlTextarea3');
            $table->text('exampleFormControlTextarea4');
            $table->text('exampleFormControlTextarea5');
            $table->text('exampleFormControlTextarea6');


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
        Schema::dropIfExists('survey');
    }
}
