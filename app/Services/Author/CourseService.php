<?php

namespace App\Services\Author;

use App\Models\Category;

class CourseService{
    function getCategory(){
        $categories = Category::all();

        return $categories;
    }
}
