<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_candidates', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->uuid('course_id');
            $table->integer('applied_for_year');
            $table->integer('admission_type');
            $table->string('admission_reference_id');
            $table->float('ssc_percentage');
            $table->float('hsc_percentage')->nullable();
            $table->integer('cet_physics')->nullable();
            $table->integer('cet_chemistry')->nullable();
            $table->integer('cet_maths')->nullable();
            $table->float('diploma_percentage')->nullable();
            $table->float('jee_main_score')->nullable();
            $table->float('residential_area')->nullable();
            $table->string('adhar_card_no')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->integer('student_category');
            $table->string('contact_no');
            $table->string('mobile_no')->nullable();
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
        Schema::table('degree_candidates', function(Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
        Schema::dropIfExists('degree_candidates');
    }
}
