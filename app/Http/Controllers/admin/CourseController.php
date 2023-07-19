<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VoucherRequest;
use App\Http\Resources\Admin\CourseResource;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Voucher;
use App\Services\Admin\CourseService;
use App\Services\Admin\CourseServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    private $coursesService;

    public function __construct(CourseService $coursesService)
    {
        $this->coursesService = $coursesService;
    }

    public function index()
    {
        $coursesData = $this->coursesService->course();
        $coursesResources = new CourseResource($coursesData);

        return view('admin.courses.index', [
            'courses' => $coursesResources['courses'],
            'vouchers' => $coursesResources['vouchers'],
        ]);
    }
    public function editVoucher(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'voucher_id' => $request->voucher_id
        ]);

        return Redirect::back()->with('message', 'Voucher token successfully Updated');
    }
    public function addVoucher(VoucherRequest $request)
    {
        Voucher::create($request->all());
        return redirect()->back()->with('message', 'Voucher token successfully added!');
    }
    public function deleteCourse(Course $course)
    {
        $course->delete();
        return Redirect::back()->with('message', 'Course Deleted');
    }
}
