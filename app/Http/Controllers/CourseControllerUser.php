<?php

namespace App\Http\Controllers;

use App\Http\Resources\Member\CourseResource;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use App\Services\Member\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseControllerUser extends Controller
{
    private $coursesService;

    public function __construct(CourseService $coursesService)
    {
        $this->coursesService = $coursesService;
    }
    public function detailCourse(Course $course)
    {
        return view('member.courses.detail', compact('course'));
    }
    public function lessonCourseDetail($id, $chapter)
    {
        $courseData = $this->coursesService->getLesson($id, $chapter);

        // Membuat resource dari data yang diambil
        $courseResource = new CourseResource($courseData);
        $id_user = Auth::id();

        $userCourse = UserCourse::where('user_id', $id_user)
            ->where('course_id', $id)
            ->where('payment_status', 'sukses')
            ->first();


        $user = User::findOrFail($id_user);
        if ($user->hasRole('author') || $user->hasRole('admin')) {
            $nextChapter = $chapter + 1;

            // Query untuk mendapatkan chapter terakhir
            $lastChapter = DB::table('lessons')
                ->where('course_id', $id)
                ->orderBy('chapter', 'desc')
                ->first();

            // Menandai apakah ini chapter terakhir atau bukan
            $isLastChapter = false;
            if ($lastChapter && $chapter == $lastChapter->chapter) {
                $isLastChapter = true;
            }

            $nextChapterExists = DB::table('lessons')
                ->where('course_id', $id)
                ->where('chapter', $nextChapter)
                ->exists();


            return view('member.courses.lesson', [
                'lesson' => $courseResource['lesson'],
                'lesson_detail' => $courseResource['lesson_detail'],
                'course' => $courseResource['course'],
                'nextChapter' => $nextChapterExists ? $nextChapter : null,
                'lastChapter' => $isLastChapter
            ]);
        }
        //jika member tapi belum punya course maka :

        //jika punya permission untuk lihat atau punya course dan sudah bayar
        if ($userCourse) {

            $nextChapter = $chapter + 1;

            // Query untuk mendapatkan chapter terakhir
            $lastChapter = DB::table('lessons')
                ->where('course_id', $id)
                ->orderBy('chapter', 'desc')
                ->first();

            // Menandai apakah ini chapter terakhir atau bukan
            $isLastChapter = false;
            if ($lastChapter && $chapter == $lastChapter->chapter) {
                $isLastChapter = true;
            }

            $nextChapterExists = DB::table('lessons')
                ->where('course_id', $id)
                ->where('chapter', $nextChapter)
                ->exists();


            return view('member.courses.lesson', [
                'lesson' => $courseResource['lesson'],
                'lesson_detail' => $courseResource['lesson_detail'],
                'course' => $courseResource['course'],
                'nextChapter' => $nextChapterExists ? $nextChapter : null,
                'lastChapter' => $isLastChapter
            ]);
        } else {
            return redirect()->back()->with('status', 'unpaid');
        }
    }
}
