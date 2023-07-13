<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function index() {
        return request()->pathInfo;
    }

    function show() {
        return request()->pathInfo;
    }
}
