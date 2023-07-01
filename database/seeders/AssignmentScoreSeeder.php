<?php

namespace Database\Seeders;

use App\Models\AssignmentScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssignmentScore::factory()->count(34)->create();
    }
}
