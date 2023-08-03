<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Services\Author\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $courseService;

    function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    function index(Request $request)
    {
        $courses = $this->courseService->getCourses($request, auth()->user()->id);
        $draft_courses = $this->courseService->getDraftCourse(auth()->user()->id);

        $sortOption = $this->courseService->sortOption();

        return view('author.course.index', [
            'menu' => parent::$menuSidebar,
            'sorts' => $sortOption,
            'courses' => $courses,
            'draft_courses' => $draft_courses,
        ]);
    }

    function show(Request $request){
        $course = Course::where('id', $request->id)->first();
        $lessons = Lesson::where('course_id', $request->id)->orderBy('chapter')->get();

        return view('author.course.detail', [
            'menu' => parent::$menuSidebar,
            'course' => $course,
            'lessons' => $lessons
        ]);
    }

    function create()
    {
        $data = $this->courseService->getCategory();

        return view('author.course.create', [
            'menu' => parent::$menuSidebar,
            'data' => json_decode($data)
        ]);
    }

    function store(CreateCourseRequest $request)
    {
        if ($this->courseService->createCourse($request)) {
            $message = 'Kursus berhasil ditambahkan';
            return redirect(route('author_course_index'))->with('success', $message);
        } else {
            $message = 'Kursus gagal ditambahkan';
            return redirect(route('author_course_index'))->with('erorr', $message);
        }

    }

    function edit($id)
    {
        $categories = $this->courseService->getCategory();
        $course = $this->courseService->getCourse($id);

        return view('author.course.edit', [
            'menu' => parent::$menuSidebar,
            'course' => json_decode($course),
            'categories' => json_decode($categories)
        ]);
    }

    function update(UpdateCourseRequest $request)
    {
        if( $this->courseService->update($request)){
            return redirect(route('author_course_index'))->with('success', 'kursus berhasil diedit');
        }

        return redirect(route('author_course_index'))->with('error', 'kursus gagal diedit');
    }

    function delete(Request $request)
    {
        Course::where('id', $request->id)->delete();
        return back()->with('success', 'kursus berhasil dihapus');
    }
}
