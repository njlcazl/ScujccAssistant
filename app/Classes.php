<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'Classes';

    protected $fillable = [
        'username', 'class_name', 'class_time', 'class_place', 'teacher_name'
    ];
}
