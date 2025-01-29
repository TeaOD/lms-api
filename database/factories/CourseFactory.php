<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(2, 10, 1000),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'details' => $this->faker->paragraph,
            'instructor_name' => $this->faker->name,
        ];
    }
}
