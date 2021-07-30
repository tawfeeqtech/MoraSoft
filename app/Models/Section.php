<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['name_Section'];

    protected $fillable=['name_Section','grade_id','class_id'];
    protected $table = 'sections';
    public $timestamps = true;

    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}