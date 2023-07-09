<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    function dashboard() {
        return request()->pathinfo;
    }

    function showProfile() {
        return request()->pathinfo;
    }

    function editProfile() {
        return request()->pathinfo;
    }

    function updateProfile() {
        return request()->pathinfo;
    }


}
