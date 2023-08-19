<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = mt_rand(1, 12);
        $course_id = mt_rand(1, 15);

        return [
            'user_id' => $user_id,
            'course_id' => $course_id,
            'photo' => 'certificate_user_'.$user_id.'_course_'.$course_id,
            'created_at' => fake()->dateTimeThisYear,
        ];
    }
}
