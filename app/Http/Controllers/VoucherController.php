<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\VoucherRequest;
use App\Models\Course;
use App\Models\Voucher;
use App\Services\Admin\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoucherController extends Controller
{
    private $coursesService;

    public function __construct(CourseService $coursesService)
    {
        $this->coursesService = $coursesService;
    }

    public function index()
    {
        $coursesData = $this->coursesService->course();

        return view('admin.courses.index', [
            'courses' => $coursesData['courses'],
            'vouchers' => $coursesData['vouchers'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'voucher_id' => $request->voucher_id,
        ]);

        return Redirect::route('admin.course.index')->with('message', 'Voucher token for course : '.$course->title.' successfully Updated');
    }

    public function edit($id)
    {
        $vouchers = Voucher::all();
        $course = Course::findOrFail($id);

        return view('admin.courses.editVoucher', compact('course', 'vouchers'));
    }

    public function store(VoucherRequest $request)
    {
        Voucher::create($request->all());

        return redirect()->back()->with('message', 'Voucher token successfully added!');
    }

    public function delete($id)
    {
        Voucher::findOrFail($id)->delete();

        return redirect()->back()->with('message', 'Voucher token succesfully deleted');
    }
}
