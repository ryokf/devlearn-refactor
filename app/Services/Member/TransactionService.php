<?php

namespace App\Services\Member;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\UserCourse;

class TransactionService{
    public function getTransaction($request, $user_id){
        $userCourses = UserCourse::where('user_id', $user_id);

        if($request->sort == 'terlama'){
            $userCourses = $userCourses->orderBy('created_at');

        } elseif($request->sort == 'abjad A-Z'){
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderBy('title');
        } elseif($request->sort == 'abjad Z-A'){
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('title');
        } elseif($request->sort == 'termahal'){
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('price');
        }elseif($request->sort == 'termurah'){
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderBy('price');
        }else{
            $userCourses = $userCourses->orderByDesc('created_at');

        }

        return $userCourses->paginate(10);
    }
}
