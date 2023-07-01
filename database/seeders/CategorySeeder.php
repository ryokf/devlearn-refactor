<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'backend programming',
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ]);

        Category::create([
            'name' => 'frontend programming',
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ]);

        Category::create([
            'name' => 'design',
            'photo' => "https://source.unsplash.com/random/" . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100
        ]);
    }
}
