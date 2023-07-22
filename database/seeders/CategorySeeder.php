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
            'photo' => "https://source.unsplash.com/random/400×200/?programming"
        ]);

        Category::create([
            'name' => 'frontend programming',
            'photo' => "https://source.unsplash.com/random/400×200/?html"
        ]);

        Category::create([
            'name' => 'design',
            'photo' => "https://source.unsplash.com/random/400×200/?design"
        ]);
    }
}
