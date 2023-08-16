<?php

namespace Database\Seeders;

use App\Models\LessonComment;
use Illuminate\Database\Seeder;

class LessonCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonComment::factory()->count(1000)->create();
    }
}
