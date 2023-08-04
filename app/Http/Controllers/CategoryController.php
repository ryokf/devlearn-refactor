<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
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

    public function show(Course $course, $id)
    {
        return $course->where('category_id', $id)->get();
    }

    public function store(Request $request)
    {
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
}
