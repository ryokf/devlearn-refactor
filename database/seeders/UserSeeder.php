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
        User::factory()->count(99)->create();

        User::create([
            'username' => 'ryo.kf',
            'email' => 'ryokhrisnaf@gmail.com',
            'password' => Hash::make('rahasia'),
            'occupation' => 'mahasiswa',
            'office' => 'univeristas dian nuswantoro',
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ]);

        User::create([
            'id' => 999,
            'username' => 'devlearn admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('rahasiaAdmin'),
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ]);
    }
}
