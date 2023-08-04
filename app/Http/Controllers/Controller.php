<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $menuSidebarauthor = [
        '/dashboard' => ['dashboard', 'fa-solid fa-chart-line'],
        '/course' => ['kursus anda', 'fa-solid fa-chalkboard'],
        '/course-create' => ['tambah kursus', 'fa-solid fa-person-chalkboard'],
        // '/member' => ['daftar transaksi', 'fa-solid fa-arrow-right-arrow-left'],
        // '/author/profile' => ['lihat profile', 'fa-solid fa-user'],
        '/profile' => ['profile', 'fa-solid fa-user-pen'],
    ];

    public static $memberMenuSidebar = [
        '/dashboard' => ['dashboard', 'fa-solid fa-chart-line'],
        '/course' => ['kursus anda', 'fa-solid fa-chalkboard'],
        // '/member/transaction' => ['daftar transaksi', 'fa-solid fa-arrow-right-arrow-left'],
        '/profile' => ['profile', 'fa-solid fa-user-pen'],
    ];
}
