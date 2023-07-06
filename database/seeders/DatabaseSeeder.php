<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            UserCourseSeeder::class,
            VoucherSeeder::class
        ]);


    }
}
