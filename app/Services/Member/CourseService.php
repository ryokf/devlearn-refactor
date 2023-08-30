<?php

namespace App\Services\Member;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonComment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public function getComment($id)
    {
        $lessonComment = LessonComment::where('lesson_id', $id)->paginate(10);

        return $lessonComment;
    }

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

        $comments = $this->getComment($id_lesson);

        $course = Course::findOrFail($id);


        $lessonIds = $user->lessons()->where('course_id', $id)->pluck('id')->toArray();

        $lessons = $user->lessons()
            ->whereIn('lesson_id', $lessonIds)
            ->get();

        $statusCounts = $lessons->groupBy('pivot.status')
            ->map(function ($group) {
                return $group->count();
            });

        $trueCount = $statusCounts->get(true, 0);
        $falseCount = $statusCounts->get(false, 0);

        // echo "True Count: {$trueCount}<br>";
        // echo "False Count: {$falseCount}<br>";

        $totalLessons = count($lessonIds);
        // echo "Total Lessons = {$totalLessons}<br>";

        //presentase progress complete
        $success = intval(($trueCount / $totalLessons) * 100);
        // echo $success . "%";



        return [
            'lessons_member' => $lessons_member,
            'lessons_all' => $lessons_all,
            'lesson_detail' => $lesson_detail,
            'course' => $course,
            'id_lesson' => $id_lesson,
            'comments' => $comments,
            'progressPercentage' => $success,
            'completed' => $trueCount,

            'totalLessons' => $totalLessons,
        ];
    }
}
