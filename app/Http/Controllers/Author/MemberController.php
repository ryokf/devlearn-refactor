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

    function index() {

        $member = json_decode(json_encode(TransactionResource::collection( $this->memberService->getTransaction())));

        return view('author.member.index', [
            'members' => $member,
            'menu' => parent::$menuSidebar
        ]);
    }

    function show() {
        return request()->pathInfo;
    }
}
