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
            'photo' => 'https://source.unsplash.com/random/400×200/?programming',
        ]);

        Category::create([
            'name' => 'mobile programming',
            'photo' => 'https://source.unsplash.com/random/400×200/?html',
        ]);

        Category::create([
            'name' => 'game programming',
            'photo' => 'https://source.unsplash.com/random/400×200/?html',
        ]);

        Category::create([
            'name' => 'data analysis',
            'photo' => 'https://source.unsplash.com/random/400×200/?design',
        ]);

        Category::create([
            'name' => 'IoT',
            'photo' => 'https://source.unsplash.com/random/400×200/?design',
        ]);

        Category::create([
            'name' => 'Design',
            'photo' => 'https://source.unsplash.com/random/400×200/?design',
        ]);
    }
}
