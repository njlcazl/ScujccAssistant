<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午1:52
 */

namespace App\Api\Controllers;


use App\Classes;

class ClassController extends BaseController
{
    public function dealClass($data, $stu_id) {
        foreach ($data as $class){
            $items = explode('<br>', $class);
            $InsData = [
                'username' => $stu_id,
                'class_name' => $items[0],
                'class_time' => $items[1],
                'class_place' => $items[3],
                'teacher_name' => $items[2]
            ];
            $class = Classes::create($InsData);
        }
    }
}