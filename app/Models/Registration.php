<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations'; // Table name

    protected $fillable = [
        'course_id',
        'student_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class); // find the course that the registration "belongs to"
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class); // find the student that the registration "belongs to"
    }
}
