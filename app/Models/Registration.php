<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // A registration belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class); // find the course that the registration "belongs to"
    }
    
    // A registration belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class); // find the student that the registration "belongs to"
    }
}
