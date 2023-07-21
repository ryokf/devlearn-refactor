<?php

namespace App\Http\Controllers;

use App\Http\Resources\Member\CourseResource;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use App\Services\Member\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->first();
        $user = User::findOrFail($id_user);
        //jika member tapi belum punya course maka :
        if ($user->hasRole('member') && (!$userCourse || !$userCourse->payment_status == "sukses")) {
            return redirect()->back()->with('status', 'unpaid');;
        }
        //jika punya permission untuk lihat atau punya course dan sudah bayar
        if ($user->hasPermissionTo('view lesson') || ($userCourse && $userCourse->payment_status == "sukses")) {
            return view('member.courses.lesson', [
                'lesson' => $courseResource['lesson'],
                'lesson_detail' => $courseResource['lesson_detail'],
                'course' => $courseResource['course'],
            ]);
        } else {
            return redirect()->back();
        }
    }
}
