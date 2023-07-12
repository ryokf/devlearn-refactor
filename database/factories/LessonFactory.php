<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => mt_rand(1, 50),
            'chapter' => mt_rand(1, 10),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(2),
            'text_content' => "<p>" . fake()->text() . "</p>" . "<p>" . fake()->text() . "</p>" . "<p>" . fake()->text() . "</p>",
            'media_content' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100,
            'thumbnail' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ];
    }
}
