<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_enquiries', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('contact_no');
            $table->string('mobile_no');
            $table->integer('status')->default(0);
            $table->integer('applied_for_year');
            $table->float('ssc_percentage');
            $table->float('hsc_percentage')->nullable();
            $table->integer('cet_physics')->nullable();
            $table->integer('cet_chemistry')->nullable();
            $table->integer('cet_maths')->nullable();
            $table->integer('jee_main_score')->nullable();
            $table->float('diploma_percentage')->nullable();
            $table->string('residential_area')->nullable();
            $table->uuid('approved_course_id');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('approved_course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_enquiries');
    }
}
