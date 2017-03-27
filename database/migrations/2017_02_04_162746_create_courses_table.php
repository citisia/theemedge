<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('code')->unqiue();
            $table->string('title');
            $table->integer('level');
            $table->integer('duration');
            $table->integer('intake')->default(60);
            $table->string('description')->nullable();
            $table->uuid('department_id');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course', function(Blueprint $table)  {
            $table->dropForeign(['deparment_id']);
        });
        Schema::dropIfExists('courses');
    }
}
