<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('school_year');
            $table->string('term');
            $table->string('class_code');
            $table->string('class_name');
            $table->string('class_property');
            $table->string('class_ascription');
            $table->string('class_credit');
            $table->string('class_point');
            $table->string('class_grade');
            $table->string('minor_flag');
            $table->string('resit_grade');
            $table->string('revamp_grade');
            $table->string('department');
            $table->string('remark');
            $table->string('revamp_flag');
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
