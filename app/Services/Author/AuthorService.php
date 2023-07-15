<?php

namespace App\Services\Author;

use App\Http\Resources\DashboardResource;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

class AuthorService
{
    function dashboard()
    {
        // course
        $course = Course::where('author_id', auth()->user()->id)->get();

        // jumlah lesson
        $lesson = [];
        $lesson_count = 0;
        foreach ($course as $findId) {
            array_push($lesson, Lesson::where('course_id', $findId->id)->get());
        }
        foreach ($lesson as $count) {
            $lesson_count += count($count);
        }

        // member
        $member = [];
        $member_count = 0;
        foreach ($course as $findId) {
            array_push($member, UserCourse::where('course_id', $findId->id)->get());
        }
        foreach ($member as $count) {
            $member_count += count($count);
        }

        //penghasilan bulan ini
        $buyerThisMonth = [];
        $courseBought = [];
        $income = 0;
        foreach ($course as $findId) {
            array_push(
                $buyerThisMonth,
                UserCourse::whereMonth('created_at', date('n'))
                    ->where('course_id', $findId->id)
                    ->get()
            );
        }
        $buyerThisMonth = collect($buyerThisMonth)->flatten()->toArray();
        foreach ($buyerThisMonth as $findCourseId) {
            $id = $findCourseId['course_id'];
            array_push($courseBought, Course::where('id', $id)
                ->get());
        }

        foreach ($courseBought as $findPrice) {
            $income += $findPrice[0]['price'];
        }

        $topBought = UserCourse::select('course_id', DB::raw('COUNT(*) as total'))
            ->groupBy('course_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $courseIds = $topBought->pluck('course_id');

        $topBought = Course::whereIn('id', $courseIds)->where('author_id', auth()->user()->id)->get();

        $topPass = Certificate::select('course_id', DB::raw('COUNT(*) as total'))
            ->groupBy('course_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $courseIds = $topPass->pluck('course_id');

        $topPass = Course::whereIn('id', $courseIds)->where('author_id', auth()->user()->id)->get();

        // jumlah pembeli perbulan
        $buyerThisMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $count = 0;
            foreach ($course as $findId) {
                $count += count(UserCourse::whereMonth('created_at', $i)
                    ->whereYear('created_at', date('Y'))
                    ->where('course_id', $findId->id)
                    ->get());
            }
            array_push($buyerThisMonth, $count);
        }

        // jumlah lulusan perbulan
        $graduateThisMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $count = 0;
            foreach ($course as $findId) {
                $count += count(Certificate::whereMonth('created_at', $i)
                    ->whereYear('created_at', date('Y'))
                    ->where('course_id', $findId->id)
                    ->get());
            }
            array_push($graduateThisMonth, $count);
        }

        //persentase perbandingan dengan bulan lalu
        $thisMonth = Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n'))->count();
        $lastMonth = Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n') - 1)->count();
        $coursePercentage = (($thisMonth - $lastMonth) / $lastMonth) * 100;

        $LessonThisMonth = [];
        $LessonLastMonth = [];
        $thisMonth = 0;
        $lastMonth = 0;
        foreach ($course as $findId) {
            array_push($LessonThisMonth, Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count());
            array_push($LessonLastMonth, Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count());
        }
        foreach ($LessonThisMonth as $count) {
            $thisMonth += $count;
        }
        foreach ($LessonLastMonth as $count) {
            $lastMonth += $count;
        }
        $lessonPercentage = (($thisMonth - $lastMonth) / $lastMonth) * 100;

        $transactionThisMonth = [];
        $transactionLastMonth = [];
        $thisMonth = 0;
        $lastMonth = 0;
        foreach ($course as $findId) {
            array_push($transactionThisMonth, UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count());
            array_push($transactionLastMonth, UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count());
        }
        foreach ($transactionThisMonth as $count) {
            $thisMonth += $count;
        }
        foreach ($transactionLastMonth as $count) {
            $lastMonth += $count;
        }
        $transactionPercentage = (($thisMonth - $lastMonth) / $lastMonth) * 100;

         //persentase penghasilan perbulan
         $thisMonth = 0;
         $lastMonth = 0;
         $incomeThisMonth = [];
         $incomeLastMonth = [];
         $courseBoughtThisMonth = [];
         $courseBoughtLastMonth = [];
         foreach ($course as $findId) {
             array_push(
                 $incomeThisMonth,
                 UserCourse::whereMonth('created_at', date('n'))
                     ->where('course_id', $findId->id)
                     ->get()
             );
             array_push(
                 $incomeLastMonth,
                 UserCourse::whereMonth('created_at', date('n') - 1)
                     ->where('course_id', $findId->id)
                     ->get()
             );
         }
         $incomeThisMonth = collect($incomeThisMonth)->flatten()->toArray();
         $incomeLastMonth = collect($incomeLastMonth)->flatten()->toArray();
         foreach ($incomeThisMonth as $findCourseId) {
             $id = $findCourseId['course_id'];
             array_push($courseBoughtThisMonth, Course::where('id', $id)
                 ->get());
         }
         foreach ($incomeLastMonth as $findCourseId) {
             $id = $findCourseId['course_id'];
             array_push($courseBoughtLastMonth, Course::where('id', $id)
                 ->get());
         }

         $incomeThisMonth = 0;
         $incomeLastMonth = 0;
         foreach ($courseBoughtThisMonth as $findPrice) {
             $incomeThisMonth += $findPrice[0]['price'];
         }
         foreach ($courseBoughtLastMonth as $findPrice) {
             $incomeLastMonth += $findPrice[0]['price'];
         }
         $incomePercentage = (($incomeThisMonth -$incomeLastMonth) / $incomeLastMonth) * 100;

        $data = [
            "coursePercentage" => [$coursePercentage, $coursePercentage > 0 ? true :false],
            "lessonPercentage" => [$lessonPercentage, $lessonPercentage > 0 ? true :false],
            "transactionPercentage" => [$transactionPercentage, $transactionPercentage > 0 ? true :false],
            "incomePercentage" => [$incomePercentage, $incomePercentage > 0 ? true :false],
            "course" => $course,
            "topBought" => collect($topBought),
            "topPass" => $topPass,
            "lesson_count" => $lesson_count,
            "member_count" => $member_count,
            "income" => $income,
            "buyer_count" => $buyerThisMonth,
            "graduate_count" => $graduateThisMonth
        ];

        return $data;
    }
}
