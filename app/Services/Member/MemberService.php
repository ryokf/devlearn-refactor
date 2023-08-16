<?php

namespace App\Services\Member;

use App\Models\Category;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\UserLesson;

class MemberService
{
    public function courseBought()
    {
        $courseBought = UserCourse::where('user_id', auth()->user()->id)->get();

        return $courseBought;
    }

    public function coursePass()
    {
        $coursePass = Certificate::where('user_id', auth()->user()->id)->get();

        return $coursePass;
    }

    public function courseBoughtPerMonth()
    {
        $coursePerMonth = [];

        for ($i = 1; $i <= 12; $i++) {
            array_push(
                $coursePerMonth,
                UserCourse::where('user_id', auth()->user()->id)
                    ->whereMonth('created_at', $i)
                    ->count()
            );
        }

        return $coursePerMonth;
    }

    public function coursePassPerMonth()
    {
        $coursePerMonth = [];

        for ($i = 1; $i <= 12; $i++) {
            array_push(
                $coursePerMonth,
                Certificate::where('user_id', auth()->user()->id)
                    ->whereMonth('created_at', $i)
                    ->count()
            );
        }

        return $coursePerMonth;
    }

    public function getCategory()
    {
        $categories = Category::all();

        return $categories;
    }

    public function passPerCategory()
    {
        $categories = Category::all();
        $user_course = UserCourse::where('user_id', auth()->user()->id)->get();

        $course_count = [];
        foreach ($categories as $key => $category) {
            array_push($course_count, []);
            foreach ($user_course as $course) {
                if ($category->id == $course->courses->id_category) {
                    array_push($course_count[$key], $course->courses->title);
                }
            }
        }

        // dd($course_count);

        return $course_count;
    }

    public function recentBought()
    {
        $courseBought = UserCourse::where('user_id', auth()->user()->id)->orderBy('created_at')->limit(5)->get();
        $courses = [];

        foreach ($courseBought as $course) {
            array_push($courses, Course::where('id', $course->course_id)->get());
        }

        return collect($courses)->flatten();
    }

    public function recentFinish()
    {
        $courseBought = Certificate::where('user_id', auth()->user()->id)->orderBy('created_at')->get();
        $courses = [];

        foreach ($courseBought as $course) {
            array_push($courses, Course::where('id', $course->course_id)->get());
        }

        return collect($courses)->flatten();
    }

    public function lastStudy()
    {
        $userLesson = UserLesson::where('user_id', auth()->user()->id)->where('status', true)->first();

        if ($userLesson == null) {
            return null;
        } else {
            $userLesson = $userLesson->pluck('lesson_id');
        }

        $lesson = Lesson::whereIn('id', $userLesson)->first();

        $course = Course::where('id', $lesson->course_id)->first();

        // return UserCourse::where('user_id', auth()->user()->id)->latest()->first();

        return [$course, $lesson];
    }

    public function dashboard()
    {
        $courseBought = $this->courseBought();
        $coursePass = $this->coursePass();
        $courseBoughtPerMonth = $this->courseBoughtPerMonth();
        $coursePassPerMonth = $this->coursePassPerMonth();
        $categories = $this->getCategory();
        $passPerCategory = $this->passPerCategory();
        $recentBought = $this->recentBought();
        $recentFinish = $this->recentFinish();
        $lastStudy = $this->lastStudy();

        return [
            'courseBought' => $courseBought,
            'coursePass' => $coursePass,
            'categories' => $categories,
            'courseBoughtPerMonth' => $courseBoughtPerMonth,
            'coursePassPerMonth' => $coursePassPerMonth,
            'passPerCategory' => $passPerCategory,
            'recentBought' => $recentBought,
            'recentFinish' => $recentFinish,
            'lastStudy' => $lastStudy,
        ];
    }
}
