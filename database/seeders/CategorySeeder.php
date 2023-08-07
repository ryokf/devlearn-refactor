<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'name' => 'web programming',
            'photo' => 'landingpage/images/icons/web.svg',
        ]);

        Category::create([
            'name' => 'mobile programming',
            'photo' => 'landingpage/images/icons/mobile.svg',
        ]);

        Category::create([
            'name' => 'game programming',
            'photo' => 'landingpage/images/icons/game.svg',
        ]);

        Category::create([
            'name' => 'data analysis',
            'photo' => 'landingpage/images/icons/dataAnalis.svg',
        ]);

        Category::create([
            'name' => 'IoT',
            'photo' => 'landingpage/images/icons/jaringan.svg',
        ]);

        Category::create([
            'name' => 'Design',
            'photo' => 'landingpage/images/icons/multimedia.svg',
        ]);
    }
}
