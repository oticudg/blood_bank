<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->enum('sex', ['M', 'F', 'T']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blood_donors_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('blood_donor_id');
            $table->boolean('answer');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('blood_donor_id')->references('id')->on('blood_donors')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('blood_donors_questions');
    }
}
