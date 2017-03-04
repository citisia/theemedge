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
            $table->string('father_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->integer('course');
            $table->integer('admission_type');
            $table->integer('admission_reference_id');
            $table->integer('reference_id');
            $table->float('ssc_percentage');
            $table->float('hsc_percentage')->nullable();
            $table->integer('cet_physics')->nullable();
            $table->integer('cet_chemistry')->nullable();
            $table->integer('cet_maths')->nullable();
            $table->float('diploma_percentage')->nullable();
            $table->float('jee_main_score')->nullable();
            $table->float('residential_area')->nullable();
            $table->string('adhar_card_no');
            $table->string('pan_card_no')->nullable();
            $table->integer('student_category');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_candidates');
    }
}
