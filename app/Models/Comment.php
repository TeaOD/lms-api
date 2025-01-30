<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments'; // Table name

    protected $fillable = [
        'comment',
        'course_id',
        'student_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class); // find the course that the comment "belongs to"
    }

    public function student()
    {
        return $this->belongsTo(Student::class); // find the student that the comment "belongs to"
    }
}
