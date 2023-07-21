<?php

namespace App\Http\Controllers;

use App\Http\Resources\Member\CourseResource;
use App\Models\Course;
use App\Services\Member\CourseService;
use Illuminate\Http\Request;

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
        // Mengirim data ke tampilan
        return view('member.courses.lesson', [
            'lesson' => $courseResource['lesson'],
            'lesson_detail' => $courseResource['lesson_detail'],
            'course' => $courseResource['course'],
        ]);
    }
}
