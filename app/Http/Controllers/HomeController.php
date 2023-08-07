<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Category $category, Course $course, UserCourse $userCourse)
    {
        $category = $category->leftJoin('courses', 'categories.id', '=', 'courses.id_category')
            ->limit(6)
            ->select('categories.id', 'categories.name', 'categories.photo', DB::raw('COUNT(courses.id) as course_count'))
            ->groupBy('categories.id', 'categories.name', 'categories.photo')
            ->orderByDesc('course_count')
            ->get();

        $popularCourse = $course->select('courses.id', 'courses.price', 'courses.title', 'courses.photo', 'categories.name as category_name', DB::raw('COUNT(user_courses.course_id) as count'))
            ->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->join('categories', 'courses.id_category', '=', 'categories.id')
            // ->leftJoin('lessons', 'courses.id', '=', 'lessons.course_id')
            ->groupBy('courses.id', 'courses.title', 'categories.name', 'courses.price', 'courses.photo')
            ->orderBy('count', 'desc')
            ->limit(8)
            ->get();


        $latestCourse = $course->latest()->limit(8)->get();

        return view('home', [
            'categories' => $category,
            'popularCourse' => $popularCourse,
            'latestCourse' => $latestCourse
        ]);
    }

    public function search()
    {
        return 'halaman cari';
    }
}
