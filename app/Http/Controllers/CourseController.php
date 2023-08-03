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

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(Request $request)
    {
        $courses = $this->courseService->getCourses($request, auth()->user()->id);
        $draft_courses = $this->courseService->getDraftCourse(auth()->user()->id);

        $sortOption = $this->courseService->sortOption();

        return view('author.course.index', [
            'menu' => parent::$menuSidebarMentor,
            'sorts' => $sortOption,
            'courses' => $courses,
            'draft_courses' => $draft_courses,
        ]);
    }

    public function show(Request $request)
    {
        $course = Course::where('id', $request->id)->first();
        $lessons = Lesson::where('course_id', $request->id)->orderBy('chapter')->get();

        return view('author.course.detail', [
            'menu' => parent::$menuSidebarMentor,
            'course' => $course,
            'lessons' => $lessons,
        ]);
    }

    public function create()
    {
        $data = $this->courseService->getCategory();

        return view('author.course.create', [
            'menu' => parent::$menuSidebarMentor,
            'data' => json_decode($data),
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        if ($this->courseService->createCourse($request)) {
            $message = 'Kursus berhasil ditambahkan';

            return redirect(route('author_course_index'))->with('success', $message);
        } else {
            $message = 'Kursus gagal ditambahkan';

            return redirect(route('author_course_index'))->with('erorr', $message);
        }

    }

    public function edit($id)
    {
        $categories = $this->courseService->getCategory();
        $course = $this->courseService->getCourse($id);

        return view('author.course.edit', [
            'menu' => parent::$menuSidebarMentor,
            'course' => json_decode($course),
            'categories' => json_decode($categories),
        ]);
    }

    public function update(UpdateCourseRequest $request)
    {
        if ($this->courseService->update($request)) {
            return redirect(route('author_course_index'))->with('success', 'kursus berhasil diedit');
        }

        return redirect(route('author_course_index'))->with('error', 'kursus gagal diedit');
    }

    public function delete(Request $request)
    {
        Course::where('id', $request->id)->delete();

        return back()->with('success', 'kursus berhasil dihapus');
    }
}
