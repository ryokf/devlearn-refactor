<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    function index() {
        return request()->pathInfo();
    }

    function create() {
        return request()->pathInfo();
    }

    function store() {
        return request()->pathInfo();
    }

    function update() {
        return request()->pathInfo();
    }

    function delete() {
        return request()->pathInfo();
    }
}
