<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午4:02
 */

namespace App\Api\Transformers;


use App\RankExam;

class RankExamTransformer extends Transformer
{
    public function transform($rankexam) {
        return [
            'User' => $rankexam['username'],
            'SchoolYear' => $rankexam['school_year'],
            'Term' => $rankexam['term'],
            'ExamName' => $rankexam['exam_name'],
            'ExamNumber' => $rankexam['exam_number'],
            'ExamDate' => $rankexam['exam_date'],
            'ExamGrade' => $rankexam['exam_grade']
        ];
    }
}