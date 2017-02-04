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
            $table->increments('id');
            $table->string('code')->unqiue();
            $table->string('title');
            $table->integer('level');
            $table->integer('duration');
            $table->integer('intake')->default(60);
            $table->string('description')->nullable();
            $table->integer('department_id')->unsigned();
            $table->timestamps();

            $table->foreign('department_id')->refernces('id')->on('departments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
