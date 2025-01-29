<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes; // Enable soft delete
    use HasFactory; // Enable model factory for fake data generation

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
