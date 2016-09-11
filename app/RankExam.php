<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankExam extends Model
{
    protected $table = 'RankExam';

    protected $fillable = [
        'username', 'school_year', 'term', 'exam_name', 'exam_number', 'exam_date', 'exam_grade'
    ];
}
