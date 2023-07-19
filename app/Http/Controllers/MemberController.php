<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function courseBought(){
        $courseBought = UserCourse::where('user_id', auth()->user()->id)->get();

        return $courseBought;
    }

    public function coursePass(){
        $coursePass = Certificate::where('user_id', auth()->user()->id)->get();

        return $coursePass;
    }

    public function dashboard(){
        $courseBought = $this->courseBought();
        $coursePass = $this->coursePass();

        return view('member.dashboard', [
            'menu' => parent::$memberMenuSidebar,
            'courseBought' => $courseBought,
            'coursePass' => $coursePass,
        ]);
    }
}
