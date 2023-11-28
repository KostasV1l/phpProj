<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;


    protected $table = 'student_course';

    protected $fillable = ['student_id', 'course_id', 'semester'];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getFirstNameAttribute()
    {
        if ($this->students === null) {
            // Handle the error here
            return;
        }

        return $this->students->first_name;
    }

    public function getLastNameAttribute()
    {
        if ($this->students === null) {
            // Handle the error here
            return;
        }

        return $this->students->last_name;
    }


    public $appends = ['firstName', 'lastName'];
//    public function getStudentNameAttribute()
//    {
//        return $this->students ? $this->students->first_name : null;
//    }
//
//    protected $appends = ['studentName'];


}
