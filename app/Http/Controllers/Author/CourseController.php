<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CoursesResource;
use App\Models\Course;
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
        $courses = json_encode(CoursesResource::collection($this->courseService->getCourse($request, auth()->user()->id)));
        $draft_courses = json_encode(CoursesResource::collection($this->courseService->getDraftCourse(auth()->user()->id)));

        $sortOption = $this->courseService->sortOption();

        return view('author.course.index', [
            'menu' => parent::$menuSidebar,
            'sorts' => $sortOption,
            'courses' => json_decode($courses),
            'draft_courses' => json_decode($draft_courses),
        ]);
    }

    function create()
    {
        $data = json_encode(new CategoryResource($this->courseService->getCategory()));

        return view('author.course.create', [
            'menu' => parent::$menuSidebar,
            'data' => json_decode($data)
        ]);
    }

    function store(CreateCourseRequest $request)
    {
        if ($this->courseService->createCourse($request)) {
            $message = 'Kursus berhasil ditambahkan';
            return back()->with('success', $message);
        } else {
            $message = 'Kursus gagal ditambahkan';
            return back()->with('erorr', $message);
        }

    }

    function edit()
    {
        return view('author.course.edit', [
            'menu' => parent::$menuSidebar
        ]);
    }

    function update()
    {
        return request()->pathInfo;
    }

    function delete(Request $request)
    {
        Course::where('id', $request->id)->delete();
        return back();
    }

    function solveProblemConfirm()
    {
        return request()->pathInfo;
    }

    function member()
    {
        return request()->pathInfo;
    }
}
