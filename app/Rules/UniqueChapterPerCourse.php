<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Lesson;

class UniqueChapterPerCourse implements Rule
{
    protected $courseId;

    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }

    public function passes($attribute, $value)
    {
        // Check if there are any existing lessons with the same course_id and chapter.
        return !Lesson::where('course_id', $this->courseId)
                     ->where('chapter', $value)
                     ->exists();
    }

    public function message()
    {
        return 'A lesson with the same chapter already exists for this course.';
    }
}
