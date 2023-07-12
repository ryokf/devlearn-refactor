<?php

namespace App\Services\Author;

use App\Models\Category;
use App\Models\Course;

class CourseService{
    function getCategory(){
        $categories = Category::all();

        return $categories;
    }

    function getCourse($author_id){
        $courses = Course::where('author_id', $author_id)->get();

        return $courses;
    }
}
