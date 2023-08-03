<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->userName(),
            'email' => fake()->email(),
            'password' => Hash::make('rahasia'),
            'occupation' => fake()->sentence(mt_rand(1, 2)),
            'office' => fake()->sentence(mt_rand(2, 3)),
            'photo' => 'https://source.unsplash.com/random/'.mt_rand(3, 8) * 100 .'x'.mt_rand(3, 8) * 100,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
