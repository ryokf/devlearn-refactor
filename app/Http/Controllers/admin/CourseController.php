<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(6);

        return view('admin.courses.index', compact('courses'));
    }
    public function deleteCourse(Course $course)
    {
        $course->delete();
        return Redirect::back()->with('message', 'Course Deleted');
    }

    public function detailCourse(Course $course)
    {
        return view('admin.courses.detail', compact('course'));
    }
    public function lessonCourse($id)
    {
        $lesson = DB::table('lessons')
            ->where('course_id', $id)
            ->orderBy('chapter', 'asc')
            ->get();

        $course = Course::findOrFail($id);
        return view('admin.courses.lesson', compact('lesson', 'course'));
    }

    public function lessonCourseDetail($id, $chapter)
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
        return view('admin.courses.lesson_detail', compact('lesson', 'course', 'lesson_detail'));
    }
}
