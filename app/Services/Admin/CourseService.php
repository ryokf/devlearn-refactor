<?php

namespace App\Services\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public function course()
    {
        $courses = Course::paginate(6);

        return [
            'courses' => $courses,
        ];
    }
}
