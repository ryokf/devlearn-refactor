<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    public function index(Category $category)
    {
        return $category->orderBy('name')->get();
    }

    public function indexAdmin(Category $category)
    {
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
        $categories = $category->orderBy('name')->get();
        return view('admin.category.index', compact('categories'));
    }

    // public function show(Course $course, $id)
    // {
    //     $indexCourse = $course->where('id_category', $id)->get();
    //     return view('member.course.index', compact('indexCourse'));
    // }
    public function show($id, Course $course, Category $category)
    {
        $categories = $category->all();
        $courses = $course->where('id_category', $id)->get();

        $populer = UserCourse::select('course_id', DB::raw('count(course_id) as count'))
            ->groupBy('course_id')
            ->orderByDesc('count')
            ->get();

        $popularCourseIds = $populer->pluck('course_id'); // Extract the course_id values from the collection

        $coursesPopuler = Course::whereIn('id', $popularCourseIds)
            ->where('id_category', $id)
            ->take(4)
            ->get();
        return view('general.category.show', compact('courses', 'coursesPopuler', 'categories'));
    }
    public function store(Request $request)
    {
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
        $file = $request->file('photo');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        Category::create(
            [
                'name' => $request->name,
                'photo' => $path,
            ]
        );

        return redirect()->back()->with('message', 'Category succesfully added!');
    }

    public function update(Request $request, $id)
    {
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/' . $path, file_get_contents($file));
            $category->photo = $path;
        }

        $category->save();

        return redirect()->route('category.index.admin')->with('message', 'Category successfully updated!');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('message', 'Category Deleted');
    }

    public function edit($id)
    {
        $menuSidebarAdmin = parent::$menuSidebarAdmin;
        view()->share('menu', $menuSidebarAdmin);
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
}
