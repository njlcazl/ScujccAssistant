<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RankExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RankExam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('school_year');
            $table->string('term');
            $table->string('exam_name');
            $table->string('exam_number');
            $table->string('exam_date');
            $table->string('exam_grade');
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
        //
    }
}
