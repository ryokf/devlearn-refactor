<?php

namespace App\Services\Member;

use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseService
{
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
