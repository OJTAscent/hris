<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_competencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employeeID')->unsigned()->nullable();
            $table->foreign('employeeID')->references('id')->on('performance')->onUpdate('cascade')->onDelete('cascade');
            $table->string('inlineRadioOptions');
            $table->string('comment');
            $table->string('inlineRadioOptions1');
            $table->string('comment1');
            $table->string('inlineRadioOptions2');
            $table->string('comment2');
            $table->string('inlineRadioOptions3');
            $table->string('comment3');
            $table->string('inlineRadioOptions4');
            $table->string('comment4');
            $table->string('inlineRadioOptions5');
            $table->string('comment5');
            $table->string('inlineRadioOptions6');
            $table->string('comment6');
            $table->string('inlineRadioOptions7');
            $table->string('comment7');
            $table->string('inlineRadioOptions8');
            $table->string('comment8');
            $table->string('inlineRadioOptions9');
            $table->string('comment9');
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
        Schema::dropIfExists('performance_competencies');
    }
}
