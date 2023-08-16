<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SpatieSeeder::class,
            AssignmentScoreSeeder::class,
            AssignmentSeeder::class,
            CategorySeeder::class,
            CertificateSeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            LessonCommentSeeder::class,
            UserCourseSeeder::class,
            // UserLessonSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}
