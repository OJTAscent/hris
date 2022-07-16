<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePerformanceSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_summary', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employeeID')->unsigned()->nullable();
            $table->foreign('employeeID')->references('id')->on('performance')->onUpdate('cascade')->onDelete('cascade');
            $table->string('employeeEffectivity1');
            $table->string('employeeEffectivity2');
            $table->string('textAreaQuestion1');
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
        Schema::dropIfExists('performance_summary');
    }
}
