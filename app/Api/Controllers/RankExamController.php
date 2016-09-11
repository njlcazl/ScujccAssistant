<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午2:27
 */

namespace App\Api\Controllers;


use App\RankExam;

class RankExamController extends BaseController
{
    public function dealRankExam($data, $stu_id) {
        foreach ($data as $examData){
            $InsData = [
                'username' => $stu_id,
                'school_year' => $examData[0],
                'term' => $examData[1],
                'exam_name' => $examData[2],
                'exam_number' => $examData[3],
                'exam_date' => $examData[4],
                'exam_grade' => $examData[5],
            ];
            $rankexam = RankExam::create($InsData);
        }
    }
}