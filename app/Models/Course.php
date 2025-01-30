<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes; // Enable soft delete
    use HasFactory; // Enable model factory for fake data generation

    protected $table = 'courses'; // Table name
    
    protected $fillable = [
        'title',
        'price',
        'start_date',
        'end_date',
        'details',
        'instructor_name'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);  // a course has many comments
    }
    
    public function registrations()
    {
        return $this->hasMany(Registration::class); // a course has many registrations
    }
}
