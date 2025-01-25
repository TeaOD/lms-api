<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // A comment belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class); // find the course that the comment "belongs to"
    }

    // A comment belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class); // find the student that the comment "belongs to"
    }
}
