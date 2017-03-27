<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->date('founded_on');
            $table->uuid('head_of_department_id')->nullable();
            $table->integer('level');
            $table->integer('display_format')->default(0);
            $table->string('description')->nullable();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('head_of_department_id')
                ->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deparments', function(Blueprint $table) {
            $table->dropForeign(['head_of_department_id']);
        });
        Schema::dropIfExists('departments');
    }
}
