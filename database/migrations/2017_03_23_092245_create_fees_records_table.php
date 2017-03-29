<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payment_date');
            $table->uuid('student_id');
            $table->string('student_type');
            $table->float('payment_amount');
            $table->float('type');
            $table->integer('year');
            $table->integer('payment_type');
            $table->integer('dd_no')->nullable();
            $table->string('bank_name');
            $table->string('location');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_records');
    }
}
