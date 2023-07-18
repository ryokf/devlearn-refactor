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

    public function getLesson($id, $chapter)
    {
        $lesson = DB::table('lessons')
            ->where('course_id', $id)
            ->orderBy('chapter', 'asc')
            ->get();

        $lesson_detail = DB::table('lessons')
            ->where('course_id', $id)
            ->where('chapter', $chapter)
            ->orderBy('chapter', 'asc')
            ->get();

        $course = Course::findOrFail($id);

        return [
            'lesson' => $lesson,
            'lesson_detail' => $lesson_detail,
            'course' => $course,
        ];
    }
}
