<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignmentScore>
 */
class AssignmentScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'assignment_id' => mt_rand(1,100),
            'user_id' => mt_rand(1,100),
            'score' => mt_rand(0,100),
            'file' => "file.pdf",
            'explanation' => fake()->paragraph(3)
        ];
    }
}
