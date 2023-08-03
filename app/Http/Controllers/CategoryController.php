<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return $category->orderBy('name')->get();
    }

    public function show(Course $course, $id)
    {
        return $course->where('category_id', $id)->get();
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));
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
            $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
            Storage::disk('local')->put('public/'.$path, file_get_contents($file));
            $category->photo = $path;
        }

        $category->save();

        return redirect()->route('category.index')->with('message', 'Category successfully updated!');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('message', 'Category Deleted');
    }
}
