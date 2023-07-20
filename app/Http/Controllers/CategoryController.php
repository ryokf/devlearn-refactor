<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }
    public function getCourseCategory($id)
    {

        $courses = Course::where('category_id', $id)->get();

        // $course = Course::where('category_id', $id);
        return view('courseCategory', compact('courses'));
    }
}
