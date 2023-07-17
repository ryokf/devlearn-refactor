<?php

namespace App\Services\Author;

use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MemberService
{
    function getTransaction()
    {
        $course = Course::where('author_id', auth()->user()->id)->get();

        $member = [];
        foreach ($course as $findId) {
            array_push($member, UserCourse::where('course_id', $findId->id)->get());
        }

        $member = collect($member)->flatten()->all();

        $member = new Collection($member);
        $perPage = 100;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $offset = ($currentPage - 1) * $perPage;

        // $member = array_slice($member, $offset, $perPage);


        // $total = count($member);

        $currentPageItems = $member->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $members = new LengthAwarePaginator(
            $currentPageItems,
            count($member),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // $paginatedData = $member->paginate($perPage, ['*'], 'page', $currentPage);

        //

        return $members;
    }
}
