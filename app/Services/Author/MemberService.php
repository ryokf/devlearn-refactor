<?php

namespace App\Services\Author;

use App\Models\Course;
use App\Models\UserCourse;

class MemberService{
    function getTransaction(){
        $course = Course::where('author_id', auth()->user()->id)->get();

        $member = [];
        foreach ($course as $findId) {
            array_push($member, UserCourse::where('course_id', $findId->id)->get());
        }

        return collect($member)->flatten()->all();
    }
}
