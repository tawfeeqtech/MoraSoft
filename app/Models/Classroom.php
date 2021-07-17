<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model 
{

    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('Grades', 'grade_id');
    }

}