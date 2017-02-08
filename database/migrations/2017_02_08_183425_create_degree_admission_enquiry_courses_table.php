<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeAdmissionEnquiryCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_admission_enquiry_courses', function (Blueprint $table) {
            $table->integer('enquiry_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->primary(['enquiry_id', 'course_id']);
            $table->foreign('enquiry_id')->references('id')
                ->on('degree_admission_enquiries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('course_id')->references('id')
                ->on('courses')->onUpdate('cascade');
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
