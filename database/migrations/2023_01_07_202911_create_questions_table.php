<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('correct');
            $table->string('image')->nullable();
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete();
            $table->integer('position');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
