<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function index()
    {
        $memberRole = Role::where('name', 'member')->first();
        $authorRole = Role::where('name', 'author')->first();

        $Member = User::whereHas('roles', function ($query) use ($memberRole) {
            $query->whereIn('role_id', [$memberRole->id]);
        })->count();

        $Author = User::whereHas('roles', function ($query) use ($authorRole) {
            $query->whereIn('role_id', [$authorRole->id]);
        })->count();

        $Course = Course::all()->count();

        $Transaction = UserCourse::all()->count();
        //hitung course populer
        $populer = UserCourse::select('course_id', DB::raw('count(course_id) as count'))
            ->groupBy('course_id')
            ->orderByDesc('count')
            ->get();
        $popularCourseIds = $populer->pluck('course_id'); // Extract the course_id values from the collection
        $coursesPopuler = Course::whereIn('id', $popularCourseIds)
            ->take(4)
            ->get();

        //hitung certificates
        $mostFrequentCourse = DB::table('certificates')
            ->select('course_id', DB::raw('COUNT(*) as total_certificates'))
            ->groupBy('course_id')
            ->orderByDesc('total_certificates')
            ->get();

        $FrequentCourse = $mostFrequentCourse->pluck('course_id');

        $certificates = Course::whereIn('id', $FrequentCourse)
            ->take(4)
            ->get();
        return view('admin.index', compact('Author', 'Member', 'Course', 'Transaction', 'coursesPopuler', 'certificates'));
    }
}
