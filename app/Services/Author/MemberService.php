<?php

namespace App\Services\Author;

use App\Models\Course;
use App\Models\UserCourse;

class MemberService
{
    public function getTransaction($request)
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
