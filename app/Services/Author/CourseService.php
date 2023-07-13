<?php

namespace App\Services\Author;

use App\Models\Category;
use App\Models\Course;
use GuzzleHttp\Psr7\Request;

class CourseService{
    function getCategory(){
        $categories = Category::all();

        return $categories;
    }

    function getCourse($author_id){
        $courses = Course::where('author_id', $author_id)->where('is_public', 1)->paginate(10);

        return $courses;
    }

    function getDraftCourse($author_id){
        $courses = Course::where('author_id', $author_id)->where('is_public', 0)->paginate(10);

        return $courses;
    }

    function createCourse($request){
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image',
            'description' => 'required|string',
        ]);

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
