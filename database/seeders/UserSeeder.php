<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();

        User::create([
            'id' => 99,
            'username' => 'devlearn admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('rahasiaAdmin'),
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100

        ]);
    }
}
