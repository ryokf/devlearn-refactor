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
            'description' => 'Mempelajari cara membuat sebuah website yang bagus dan menarik',
        ]);

        Category::create([
            'name' => 'mobile programming',
            'photo' => 'landingpage/images/icons/mobile.svg',
            'description' => 'Mempelajari cara membuat aplikasi mobile berbasis android maupun ios',
        ]);

        Category::create([
            'name' => 'game programming',
            'photo' => 'landingpage/images/icons/game.svg',
            'description' => 'Mempelajari cara membuat aplikasi game yang banyak digemari orang',
        ]);

        Category::create([
            'name' => 'data analysis',
            'photo' => 'landingpage/images/icons/dataAnalis.svg',
            'description' => 'mempelajari berbagai konsep, teknik, dan alat yang digunakan untuk mengumpulkan, membersihkan, menganalisis, menginterpretasi, dan mengambil keputusan berdasarkan data.',
        ]);

        Category::create([
            'name' => 'IoT',
            'photo' => 'landingpage/images/icons/jaringan.svg',
            'description' => 'Mempelajari konsep di mana objek-objek fisik yang dapat terhubung ke internet saling berinteraksi dan berkomunikasi dengan manusia, perangkat lain, atau sistem',
        ]);

        Category::create([
            'name' => 'Design',
            'photo' => 'landingpage/images/icons/multimedia.svg',
            'description' => 'Mempelajari cara membuat design grafis yang bagus , indah , dan estetik',
        ]);
    }
}
