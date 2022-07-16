<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceGoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_goal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employeeID')->unsigned()->nullable();
            $table->foreign('employeeID')->references('id')->on('performance')->onUpdate('cascade')->onDelete('cascade');
            $table->string('performanceGoal1');
            $table->string('performanceGoal2');
            $table->string('developmentGoal1');
            $table->string('developmentGoal2');
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
        Schema::dropIfExists('performance_goal');
    }
}
