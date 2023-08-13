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
        $lessons_all = Lesson::where('course_id', $id)
            ->orderBy('chapter', 'asc')
            ->get();
        $id_user = Auth::id();
        $user = User::find($id_user);
        $lessons_member = $user->lessons()->where('course_id', $id)->orderBy('chapter')->get();
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
            'lessons_member' => $lessons_member,
            'lessons_all' => $lessons_all,
            'lesson_detail' => $lesson_detail,
            'course' => $course,
            'id_lesson' => $id_lesson,
        ];
    }
}
