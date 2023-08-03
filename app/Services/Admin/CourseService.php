<?php

namespace App\Services\Admin;

use App\Models\Course;
use App\Models\Voucher;

class CourseService
{
    public function course()
    {
        $courses = Course::with('auhtor')->paginate(6);
        $vouchers = Voucher::all();

        return [
            'courses' => $courses,
            'vouchers' => $vouchers,
        ];
    }
}
