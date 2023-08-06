<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Voucher;
use App\Services\Admin\CourseService as AdminCourseService;
use App\Models\User;
use App\Models\UserCourse;
use App\Services\Author\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    private $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        if ($user->hasRole('admin')) {
            return view('admin.dashboard', [
                // 'menu' => parent::$menuSidebar
            ]);
        } elseif ($user->hasRole('author')) {
            $courses = $this->courseService->getCourses($request, auth()->user()->id);
            $draft_courses = $this->courseService->getDraftCourse(auth()->user()->id);
            $sortOption = $this->courseService->sortOption();

            return view('author.course.index', [
                'menu' => parent::$menuSidebarauthor,
                'sorts' => $sortOption,
                'courses' => $courses,
                'draft_courses' => $draft_courses,

            ]);
        } elseif ($user->hasRole('member')) {
            $courses = UserCourse::where('user_id', auth()->user()->id)->paginate(16);
            return view('member.course.index', [
                'menu' => parent::$memberMenuSidebar,
                'courses' => $courses,
            ]);
        } else {
            return true;
        }
    }

    public function show(Request $request, Course $course, UserCourse $userCourse)
    {
        $course = Course::where('id', $request->id)->first();
        $lessons = Lesson::where('course_id', $request->id)->orderBy('chapter')->get();
        $member = $this->courseService->member($course, $userCourse);

        return view('author.course.show', [
            'menu' => parent::$menuSidebarauthor,
            'course' => $course,
            'lessons' => $lessons,
            'member' => $member
        ]);
    }

    public function create()
    {
        $data = $this->courseService->getCategory();

        return view('author.course.create', [
            'menu' => parent::$menuSidebarauthor,
            'data' => json_decode($data),
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        if ($this->courseService->createCourse($request)) {
            $message = 'Kursus berhasil ditambahkan';
            return redirect(route('course.index'))->with('success', $message);
        } else {
            $message = 'Kursus gagal ditambahkan';
            return redirect(route('course.index'))->with('erorr', $message);
        }
    }

    public function edit($id)
    {
        $categories = $this->courseService->getCategory();
        $course = $this->courseService->getCourse($id);

        return view('author.course.edit', [
            'menu' => parent::$menuSidebarauthor,
            'course' => $course,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateCourseRequest $request)
    {
        if ($this->courseService->update($request)) {
            return redirect(route('course.index'))->with('success', 'kursus berhasil diedit');
        }

        return redirect(route('course.index'))->with('error', 'kursus gagal diedit');
    }

    public function delete(Request $request)
    {
        Course::where('id', $request->id)->delete();

        return back()->with('success', 'kursus berhasil dihapus');
    }


    public function indexAdmin()
    {
        $courses = Course::paginate(6);
        $vouchers = Voucher::all();
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
        return view(
            'admin.course.index',
            compact('courses', 'vouchers')

        );
    }
}
