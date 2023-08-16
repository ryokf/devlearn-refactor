<?php

namespace App\Services\Author;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    public function getCategory()
    {
        $categories = Category::all();

        return $categories;
    }

    public function sortOption()
    {
        return [
            'terbaru',
            'terlama',
            'abjad A-Z',
            'abjad Z-A',
            'termurah',
            'termahal',
        ];
    }

    public function getCourses($request, $author_id)
    {
        $courses = Course::where('author_id', $author_id)->where('is_public', 1);

        if ($request->search != null) {
            $courses = $courses->where('title', 'like', '%'.$request->search.'%');
        }

        $courses = $courses->when($request->sort == 'terlama', function ($query) {
            return $query->orderBy('created_at', 'asc');
        })
            ->when($request->sort == 'abjad A-Z', function ($query) {
                return $query->orderBy('title', 'asc');
            })
            ->when($request->sort == 'abjad Z-A', function ($query) {
                return $query->orderBy('title', 'desc');
            })
            ->when($request->sort == 'termahal', function ($query) {
                return $query->orderBy('price', 'desc');
            })
            ->when($request->sort == 'termurah', function ($query) {
                return $query->orderBy('price', 'asc');
            })
            ->orderBy('created_at', 'desc');

        // dd($courses->paginate(10));

        return $courses->paginate(10);
    }

    public function getUserCourses(Request $request, $user_id)
    {
        $userCourses = UserCourse::where('user_id', $user_id);

        if ($request->search != null) {
            $userCourses = $userCourses->orderByDesc('created_at')->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->where('title', 'like', '%'.$request->search.'%');

            return $userCourses->get();
        }

        if ($request->sort == 'terlama') {
            $userCourses = $userCourses->orderBy('created_at')->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('title');
        } elseif ($request->sort == 'abjad A-Z') {
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderBy('title');
        } elseif ($request->sort == 'abjad Z-A') {
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('title');
        } elseif ($request->sort == 'termahal') {
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('price');
        } elseif ($request->sort == 'termurah') {
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderBy('price');
        } elseif ($request->get('status') == 'pass') {
            $userCourses = $userCourses->pluck('course_id');

            $userCourses = Certificate::where('user_id', $user_id)->whereIn('course_id', $userCourses)->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses);
        } elseif ($request->get('status') == 'ongoing') {
            $pass = Certificate::where('user_id', $user_id)->pluck('course_id');

            $userCourses = UserCourse::where('user_id', $user_id)->whereNotIn('course_id', $pass)->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses);
        } else {
            $userCourses = $userCourses->orderByDesc('created_at')->pluck('course_id');

            $userCourses = Course::whereIn('id', $userCourses)->orderByDesc('title');
        }

        return $userCourses->paginate(12);

    }

    public function getDraftCourse($author_id)
    {
        $courses = Course::where('author_id', $author_id)->where('is_public', 0)->paginate(10);

        return $courses;
    }

    public function getCourse($id)
    {
        return Course::where('id', $id)->first();
    }

    public function member(UserCourse $userCourse, Request $request)
    {

        return $userCourse->where('course_id', $request->id)->paginate(10);
    }

    public function createCourse(CreateCourseRequest $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public');
        }

        $data['author_id'] = auth()->user()->id;

        $course = Course::create([
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'id_category' => $request->id_category,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'is_public' => $request->with_draft ?? true,
        ]);

        return $course;
    }

    public function update($request)
    {
        $course = Course::findOrFail($request->id);

        $course->fill($request->only([
            'title',
            'author_id',
            'id_category',
            'description',
            'price',
            'status',
            'is_public',
        ]));

        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($course->photo) {
                Storage::delete($course->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $course->photo = $photoPath;
        }

        return $course->save();
    }
}
