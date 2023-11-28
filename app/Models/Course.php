<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }

    public function student_course()
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function getProgrammeNameAttribute()
    {
        return $this->programme->name;
    }
//    public function getStudentNamesAttribute()
//    {
//        return $this->student_course->firstName;
//    }
//
    public function getSemesterAttribute()
    {
        return $this->student_course->pluck('semester')->all();
    }

    public function getFirstNameAttribute()
    {
        return $this->student_course->pluck('firstName')->all();
    }

    public function getLastNameAttribute()
    {
        return $this->student_course->pluck('lastName')->all();
    }


    protected $appends = ['programmeName', 'semester', 'firstName', 'lastName'];
}
