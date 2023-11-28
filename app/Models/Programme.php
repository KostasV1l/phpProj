<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    //Relationship between models
    public function students()
    {
        //short version
        return $this->hasMany(Student::class); //One programme has many student

        //long version
//        return $this->hasMany(Student::class, 'programme_id', 'id'); //One programme has many student
    }

    public function courses()
    {
        //short version
        return $this->hasMany(Course::class); //One programme has many courses

        //long version
//        return $this->hasMany(Course::class, 'programme_id, 'id'); //One programme has many courses
    }

}
