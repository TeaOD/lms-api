<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // A student has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class); // a student has many comments
    }

    // A student has many registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class); // a student has many registrations
    } 
}
