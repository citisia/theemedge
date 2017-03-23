<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_records', function (Blueprint $table) {
            $table->uuid('student_id');
            $table->string('student_type');
            $table->float('ssc_percentage');
            $table->date('ssc_passing_date');
            $table->string('ssc_board');
            $table->float('hsc_percentage')->nullable();
            $table->date('hsc_passing_dae')->nullable();
            $table->string('hsc_board')->nullable();
            $table->integer('cet_physics')->nullable();
            $table->integer('cet_chemistry')->nullable();
            $table->integer('cet_maths')->nullable();
            $table->float('diploma_percentage')->nullable();
            $table->date('diploma_passing_year')->nullable();
            $table->string('diploma_board')->nullable();
            $table->float('jee_main_score')->nullable();
            $table->float('sem_one')->nullable();
            $table->float('sem_two')->nullable();
            $table->float('sem_three')->nullable();
            $table->float('sem_four')->nullable();
            $table->float('sem_five')->nullable();
            $table->float('sem_six')->nullable();
            $table->float('sem_seven')->nullable();
            $table->float('sem_eight')->nullable();
            $table->timestamps();


            $table->primary('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_records');
    }
}
