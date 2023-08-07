<?php

namespace App\Services\Member;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public function getLesson($id, $chapter)
    {
        $userId = Auth::id();
        $user = Auth::user();

        $lessons = Lesson::where('course_id', $id)
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
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
