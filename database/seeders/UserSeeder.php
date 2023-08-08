<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'name' => 'dev_author',
            'email' => 'author@gmail.com',
            'password' => Hash::make('rahasia123'),
            'occupation' => 'mahasiswa',
            'office' => 'univeristas dian nuswantoro',
            'photo' => 'assets/dummy-img.jpg'
        ]);

        User::create([
            'name' => 'dev_member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('rahasia123'),
            'occupation' => 'mahasiswa',
            'office' => 'univeristas dian nuswantoro',
            'photo' => 'assets/dummy-img.jpg'
        ]);

        User::factory()->count(9)->create();

        User::create([
            'name' => 'devlearn admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('rahasiaAdmin'),
            'photo' => 'assets/dummy-img.jpg'
        ]);

    }
}
