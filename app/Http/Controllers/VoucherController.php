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
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
    }

    public function index()
    {
        $coursesData = $this->coursesService->course();

        return view('admin.course.index', [
            'courses' => $coursesData['courses'],
            'vouchers' => $coursesData['vouchers'],
        ]);
    }


    //tambah voucher di course
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'voucher_id' => $request->voucher_id,
        ]);

        return Redirect::route('course.index.admin')->with('message', 'Voucher token for course : ' . $course->title . ' successfully Updated');
    }

    //ke halamana edit + tambah voucher di course
    public function edit($id)
    {
        $vouchers = Voucher::all();
        $course = Course::findOrFail($id);
        return view('admin.course.edit_voucher', compact('course', 'vouchers'));
    }

    //create voucher
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
