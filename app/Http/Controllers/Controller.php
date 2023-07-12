<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static public $menuSidebar = [
        '/author' => ['dashboard', 'fas fa-tv'],
        '/author/course-create' => ['tambah kursus', 'fa-solid fa-person-chalkboard'],
        '/author/search' => ['pencarian', 'fa-solid fa-magnifying-glass'],
        '/author/participant' => ['peserta', 'fa-solid fa-people-line']
    ];

    function __construct()
    {
        $user = User::where('email', 'ryokhrisnaf@gmail.com')->first();

        Auth::login($user);

    }

    function __destruct()
    {
        Auth::logout();
    }
}
