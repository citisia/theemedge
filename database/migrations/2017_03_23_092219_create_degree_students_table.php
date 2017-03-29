<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_students', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('gr_no');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->integer('admitted_year');
            $table->integer('current_year');
            $table->integer('status');
            $table->float('residential_address')->nullable();
            $table->integer('pincode');
            $table->string('adhar_card_no')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->integer('category');
            $table->integer('sub_category');
            $table->string('contact_no');
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->uuid('course_id');
            $table->integer('admission_type');
            $table->string('admission_reference_id');
            $table->timestamps();

            $table->primary('id');

            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_students');
    }
}
