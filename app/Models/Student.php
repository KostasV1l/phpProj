<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

//    protected $fillable = ['first_name', 'last_name', 'programme_id'];


    public function programmes()
    {

        return $this->belongsTo(Programme::class, 'programme_id');

    }

    public function student_courses()
    {
        return $this->hasMany(StudentCourse::class);
    }

}
