<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $populer = UserCourse::select('course_id', DB::raw('count(course_id) as count'))
            ->groupBy('course_id')
            ->orderByDesc('count')
            ->get();

        $popularCourseIds = $populer->pluck('course_id'); // Extract the course_id values from the collection

        $coursesPopuler = Course::whereIn('id', $popularCourseIds)
            ->where('category_id', $id)
            ->take(4)
            ->get();

        // $course = Course::where('category_id', $id);

        return view('courseCategory', compact('courses', 'coursesPopuler'));
    }
}
