<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes; // Enable soft delete

    // A course has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);  // a course has many comments
    }
    
    // A course has many registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class); // a course has many registrations
    }
}
