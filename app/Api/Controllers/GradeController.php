<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午2:25
 */

namespace App\Api\Controllers;


use App\Grades;

class GradeController extends BaseController
{
    public function dealGrade($data, $stu_id) {
        foreach ($data as $gradeData){
            $InsData = [
                'username' => $stu_id,
                'school_year' => $gradeData[0],
                'term' => $gradeData[1],
                'class_code' => $gradeData[2],
                'class_name' => $gradeData[3],
                'class_property' => $gradeData[4],
                'class_ascription' => $gradeData[5],
                'class_credit' => $gradeData[6],
                'class_point' => $gradeData[7],
                'class_grade' => $gradeData[8],
                'minor_flag' => $gradeData[9],
                'resit_grade' => $gradeData[10],
                'revamp_grade' => $gradeData[11],
                'department' => $gradeData[12],
                'remark' => $gradeData[13],
                'revamp_flag' => $gradeData[14]
            ];
            $class = Grades::create($InsData);
        }
    }
}