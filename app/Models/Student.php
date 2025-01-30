<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Table name

    protected $fillable = [
        'name',
        'price',
        'start_date',
        'end_date',
        'details',
        'instructor_name'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class); // a student has many comments
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class); // a student has many registrations
    } 
}
