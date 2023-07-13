<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index()
    {
        $UserCourses = UserCourse::all();
        return view('admin.userCourse.index', compact('UserCourses'));
    }
}
