<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeAdmissionEnquiryCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_admission_enquiry_comments', function (Blueprint $table) {
            $table->integer('enquiry_id')->unsigned();
            $table->string('content');
            $table->timestamps();
            $table->foreign('enquiry_id')->references('id')->on('degree_admission_enquiries')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_admission_enquiry_comments');
    }
}
