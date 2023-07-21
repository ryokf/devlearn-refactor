<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserCourseController extends Controller
{
    public function index()
    {
        $UserCourses = UserCourse::paginate(7);
        return view('admin.userCourse.index', compact('UserCourses'));
    }

    public function updateStatus(UserCourse $userCourse)
    {
        if ($userCourse->payment_status == "sukses") {
            return Redirect::back()->with('message', 'Payment Already Updated');
        }
        $userCourse->update([
            'payment_status' => "sukses"
        ]);

        return Redirect::back()->with('message', 'Payment Status Updated');
    }
}
