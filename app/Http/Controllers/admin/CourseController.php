<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\VoucherRequest;
use App\Http\Resources\Admin\CourseResource;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Voucher;
use App\Services\Admin\CourseService;
use App\Services\Admin\CourseServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
    public function updateVoucher(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'voucher_id' => $request->voucher_id
        ]);

        return Redirect::route('admin.course.index')->with('message',  'Voucher token for course : ' . $course->title . ' successfully Updated');
    }
    public function editVoucher($id)
    {
        $vouchers = Voucher::all();
        $course = Course::findOrFail($id);
        return view('admin.courses.editVoucher', compact('course', 'vouchers'));
    }
    public function addVoucher(VoucherRequest $request)
    {
        Voucher::create($request->all());
        return redirect()->back()->with('message', 'Voucher token successfully added!');
    }
    public function deleteVoucher($id)
    {
        Voucher::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Voucher token succesfully deleted');
    }
    public function deleteCourse(Course $course)
    {
        $course->delete();
        return Redirect::back()->with('message', 'Course Deleted');
    }

    public function getCategories()
    {
        $categories =  Category::all();
        return view('admin.courses.category', compact('categories'));
    }

    public function addCategories(CategoryRequest $request)
    {

        $file = $request->file('photo');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        Category::create(
            [
                'name' => $request->name,
                'photo' => $path
            ]
        );
        return redirect()->back()->with('message', 'Category succesfully added!');
    }
    public function deleteCategories($id)
    {
        Category::findOrFail($id)->delete();
        return Redirect::back()->with('message', 'Category Deleted');
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.courses.editCategory', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        if ($request->hasFile('photo')) {
            // Jika ada file foto yang diunggah, proses foto baru seperti yang telah Anda lakukan sebelumnya
            $file = $request->file('photo');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/' . $path, file_get_contents($file));
            $category->photo = $path;
        }

        // Jika tidak ada file foto yang diunggah, maka foto yang ada saat ini akan dipertahankan
        // Tidak ada perubahan pada properti $category->photo

        $category->save();

        return redirect()->route('admin.course.category')->with('message', 'Category successfully updated!');
    }
}
