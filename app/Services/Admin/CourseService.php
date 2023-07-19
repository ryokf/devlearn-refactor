<?php

namespace App\Services\Admin;

use App\Models\Course;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public function course()
    {
        $courses = Course::paginate(6);
        $vouchers = Voucher::all();
        return [
            'courses' => $courses,
            'vouchers' => $vouchers,
        ];
    }
}
