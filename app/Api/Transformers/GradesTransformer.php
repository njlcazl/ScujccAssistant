<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午3:53
 */

namespace App\Api\Transformers;


use App\Grades;

class GradesTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Grades $grade) {
        return [
             'User' => $grade['username'],
             'SchoolYear' => $grade['school_year'],
             'Term' => $grade['term'],
             'ClassCode' => $grade['class_code'],
             'ClassName' => $grade['class_name'],
             'ClassProperty' => $grade['class_property'],
             'ClassAscription' => $grade['class_ascription'],
             'ClassCredit' => $grade['class_credit'],
             'ClassPoint'  => $grade['class_point'],
             'ClassGrade'  => $grade['class_grade'],
             'MinorFlag' => $grade['minor_flag'],
             'ResitGrade' => $grade['resit_grade'],
             'RevampGrade' => $grade['revamp_grade'],
             'Department' => $grade['department'],
             'Remark' => $grade['remark'],
             'RevampFlag' => $grade['revamp_flag']
        ];
    }
}