<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    //الحقل المراد ترجمته في قاعدة البيانات
    use HasTranslations;
    public $translatable = ['name_class'];
    // الحقول المراد ادخالها في قاعدة البيانات
    protected $fillable = ['name_class','grade_id'];

    protected $table = 'Classrooms';
    public $timestamps = true;

    /*
     يوجد علاقة بين جدول (Grades & Classroom ==> one to many) المراحل والصفوف  *
     *  a المرحلة بها اكثر من صف وليس العكس
     * */
    public function Grades()
    {
        // Classroom Table ينتمي إلى Grades Table عن طريق foreign key (grade_id)
        // foreignKey grade_id يؤشر على id الموجود في Grades Table
        return $this->belongsTo(Grade::class, 'grade_id');
    }

}