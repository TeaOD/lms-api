<?php

use App\Models\Course;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function test_course_creation()
    {
        // Create a fake course
        $course = Course::factory()->create();

        // Assert that the course was created
        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'title' => $course->title,
        ]);
    }
}
