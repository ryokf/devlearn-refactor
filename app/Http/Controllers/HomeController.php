<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(Category $category)
    {
        return $category->leftJoin('courses', 'categories.id', '=', 'courses.category_id')
            ->limit(6)
            ->select('categories.id', 'categories.name', 'categories.photo', DB::raw('COUNT(courses.id) as course_count'))
            ->groupBy('categories.id', 'categories.name', 'categories.photo')
            ->orderByDesc('course_count')
            ->get();
    }
}
