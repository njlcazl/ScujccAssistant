<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午3:22
 */

namespace App\Api\Transformers;


use App\Classes;

class ClassesTransformer extends Transformer
{
    public function transform($user) {
        return [
            'User' => $user['username'],
            'ClassName' => $user['class_name'],
            'Time' => $user['class_time'],
            'Place' => $user['class_place'],
            'TeacherName' => $user['teacher_name']
        ];
    }
}