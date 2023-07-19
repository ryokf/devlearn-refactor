<?php

namespace App\Services\Author;

use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MemberService
{
    function getTransaction($request)
    {
        $course = Course::where('author_id', auth()->user()->id)->get();

        $member = [];
        foreach ($course as $findId) {
            array_push($member, UserCourse::where('course_id', $findId->id)->get());
        }

        $member = collect($member)->flatten()->all();

        return collect($member)->forPage($request->get('page'), 10);
    }
}
