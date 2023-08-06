<?php

namespace App\Services\Member;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public function getLesson($id, $chapter)
    {
        $lessons = Lesson::with('userLesson')
            ->where('course_id', $id)
            ->orderBy('chapter', 'asc')
            ->get();

        $lesson_detail = DB::table('lessons')
            ->where('course_id', $id)
            ->where('chapter', $chapter)
            ->orderBy('chapter', 'asc')
            ->get();


        $id_lesson = DB::table('lessons')
            ->where('course_id', $id)
            ->where('chapter', $chapter)
            ->value('id');


        $course = Course::findOrFail($id);

        return [
            'lessons' => $lessons,
            'lesson_detail' => $lesson_detail,
            'course' => $course,
            'id_lesson' => $id_lesson,
        ];
    }
}
