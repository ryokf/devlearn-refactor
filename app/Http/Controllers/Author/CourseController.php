<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CoursesResource;
use App\Http\Resources\DetailCourseResource;
use App\Models\Course;
use App\Services\Author\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    private $courseService;

    function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    function index(Request $request)
    {
        $courses = json_encode(CoursesResource::collection($this->courseService->getCourses($request, auth()->user()->id)));
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
            return redirect(route('author_course_index'))->with('success', $message);
        } else {
            $message = 'Kursus gagal ditambahkan';
            return redirect(route('author_course_index'))->with('erorr', $message);
        }

    }

    function edit($id)
    {
        $categories = json_encode(new CategoryResource($this->courseService->getCategory()));
        $course = json_encode(new DetailCourseResource($this->courseService->getCourse($id)));

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
