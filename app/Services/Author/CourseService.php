<?php

namespace App\Services\Author;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Category;
use App\Models\Course;

class CourseService
{
    function getCategory()
    {
        $categories = Category::all();

        return $categories;
    }

    function sortOption()
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

    function getCourse($request, $author_id)
    {
        $courses = Course::where('author_id', $author_id)->where('is_public', 1);

        if($request->search != null){
            $courses = $courses->where('title', 'like', '%' . $request->search . '%');
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


        return  $courses->paginate(10);
    }

    function getDraftCourse($author_id)
    {
        $courses = Course::where('author_id', $author_id)->where('is_public', 0)->paginate(10);

        return $courses;
    }

    public function createCourse(CreateCourseRequest $request)
    {
        // $data = $request->validate([
        //     'title' => 'required|string|max:100',
        //     'category_id' => 'required',
        //     'price' => 'required|numeric',
        //     'photo' => 'required|image',
        //     'description' => 'required|string',
        // ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public');
        }

        $data['author_id'] = auth()->user()->id;

        $course = Course::create([
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'is_public' => $request->with_draft ?? true,
        ]);

        return $course;
    }
}
