<?php

namespace Database\Seeders;

use App\Models\LessonCommentReply;
use Illuminate\Database\Seeder;

class LessonCommentReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonCommentReply::factory()->count(2000)->create();
    }
}
