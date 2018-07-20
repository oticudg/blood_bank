<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blood_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 5)->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blood_donors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('last_name', 40);
            $table->unsignedInteger('num_id')->unique();
            $table->string('email', 50)->unique()->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('sex', ['M', 'F']);
            $table->unsignedInteger('blood_group_id')->nullable();
            $table->text('place_birthdate')->nullable();
            $table->unsignedInteger('phone_person')->nullable();
            $table->text('location_home')->nullable();
            $table->unsignedInteger('phone_home')->nullable();
            $table->text('location_work')->nullable();
            $table->unsignedInteger('phone_work')->nullable();
            $table->string('profession', 50)->nullable();
            $table->string('current_occupation', 50)->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_groups');
        Schema::dropIfExists('blood_donors');
    }
}
