<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\UserCourse;
use App\Services\Member\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $memberService;

    function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function dashboard()
    {
        $courseBought = $this->memberService->courseBought();
        $coursePass = $this->memberService->coursePass();
        $courseBoughtPerMonth = $this->memberService->courseBoughtPerMonth();
        $coursePassPerMonth = $this->memberService->coursePassPerMonth();
        $categories = $this->memberService->getCategory();
        $passPerCategory = $this->memberService->passPerCategory();
        $recentBought = $this->memberService->recentBought();
        $recentFinish = $this->memberService->recentFinish();


        return view('member.dashboard', [
            'menu' => parent::$memberMenuSidebar,
            'courseBought' => $courseBought,
            'coursePass' => $coursePass,
            'categories' => $categories,
            'courseBoughtPerMonth' => $courseBoughtPerMonth,
            'coursePassPerMonth' => $coursePassPerMonth,
            'passPerCategory' => $passPerCategory,
            'recentBought' => $recentBought,
            'recentFinish' => $recentFinish,
        ]);
    }

    public function courses(){
        $courses = UserCourse::where('user_id', auth()->user()->id)->where('payment_status', 'sukses')->get();

        return view('member.courses.index', [
            'menu' => parent::$memberMenuSidebar,
            'courses' => $courses,
        ]);
    }

    public function transaction(){
        return view('member.transaction', [
            'menu' => parent::$memberMenuSidebar,
            'transaction' => UserCourse::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
