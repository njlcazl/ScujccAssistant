<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'Grades';

    protected $fillable = [
        'username', 'school_year', 'term', 'class_code', 'class_name', 'class_property', 'class_ascription',
        'class_credit', 'class_point', 'class_grade', 'minor_flag', 'resit_grade' , 'revamp_grade',
        'department', 'remark', 'revamp_flag'
    ];
}
