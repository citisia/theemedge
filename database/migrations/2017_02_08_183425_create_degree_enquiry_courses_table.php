<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeEnquiryCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_enquiry_courses', function (Blueprint $table) {
            $table->uuid('enquiry_id');
            $table->uuid('course_id');

            $table->primary(['enquiry_id', 'course_id']);
            $table->foreign('enquiry_id')->references('id')->on('degree_enquiries')->onDelete('cascade');
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
        Schema::dropIfExists('degree_admission_enquiry_courses');
    }
}
