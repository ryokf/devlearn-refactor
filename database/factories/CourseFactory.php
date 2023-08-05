<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_id' => 1,
            'title' => fake()->sentence(mt_rand(3, 5)),
            'category_id' => mt_rand(1, 6),
            // 'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100,
            'price' => mt_rand(10, 100) * 10000,
            'description' => fake()->paragraph(),
            'voucher_id' => mt_rand(1, 3),
            'created_at' => fake()->dateTimeThisYear,
        ];
    }
}
