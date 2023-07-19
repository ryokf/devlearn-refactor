<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Course;
use App\Models\UserCourse;
use App\Services\Author\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $memberService;

    function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    function index(Request $request)
    {

        $course = Course::where('author_id', auth()->user()->id)->paginate(10);

        $memberIds = $course->pluck('id');
        $members = UserCourse::whereIn('course_id', $memberIds)->paginate(10);

        $member = TransactionResource::collection($this->memberService->getTransaction($request));

        return view('author.member.index', [
            'members' => $member,
            'member_link' => $members,
            'menu' => parent::$menuSidebar
        ]);
    }

    function show()
    {
        return request()->pathInfo;
    }
}
