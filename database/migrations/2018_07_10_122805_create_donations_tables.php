<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('type_donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('abbreviation', 10);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('laboratory', function (Blueprint $table) {
            $table->increments('id');
            // HB/HCTO
            $table->string('Hemoglobina', 50);
            $table->string('Hematocrito', 50);
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial', 50); // Serial Nº: H.C:  A-
            $table->unsignedInteger('blood_donor_id');
            $table->unsignedInteger('type_donation_id');
            $table->unsignedInteger('recorder_id');
            $table->unsignedInteger('blood_group_id')->nullable();
            $table->unsignedInteger('weight');
            $table->unsignedInteger('height');
            $table->unsignedInteger('pulse');
            $table->unsignedInteger('temperature');
            $table->string('blood_pressure', 15);
            // $table->unsignedInteger('state_id');
            // $table->unsignedInteger('responsible_extraction_donor_id')->nullable();
            // $table->unsignedInteger('responsible_laboratory_id')->nullable();
            $table->string('name_patient', 50)->nullable();
            $table->text('location')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();


            // $table->foreign('responsible_extraction_donor_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('responsible_laboratory_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
            $table->foreign('type_donation_id')->references('id')->on('type_donations')->onDelete('cascade');
            $table->foreign('recorder_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('blood_donor_id')->references('id')->on('blood_donors')->onDelete('cascade');
        });

        // tipo de producto st  plaq  plasma  otro son 7
        // Schema::create('type_produts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name', 50);
        //     $table->text('description')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
            // segmento 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
        Schema::dropIfExists('type_donations');
        Schema::dropIfExists('type_produts');
        Schema::dropIfExists('laboratory');
        Schema::dropIfExists('donations');
    }
}
