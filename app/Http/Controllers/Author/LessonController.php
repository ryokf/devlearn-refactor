<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Rules\UniqueChapterPerCourse;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    function index()
    {
        return request()->pathInfo();
    }

    function create(Request $request)
    {
        return view('author.lesson.create', [
            'menu' => parent::$menuSidebar
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'chapter' => ['required', 'integer', new UniqueChapterPerCourse($request->input('course_id'))],
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'text_content' => 'required|string',
            'media_content' => 'required|image',
            // 'thumbnail' => 'string',
            'is_public' => 'boolean',
            'is_problem' => 'boolean',
        ]);

        if ($request->hasFile('media_content')) {
            $file = $request->file('media_content');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/media_content', $filename);
        }

        $lesson = new Lesson();
        $lesson->course_id = $request->input('course_id');
        $lesson->chapter = $request->input('chapter');
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('description');
        $lesson->text_content = $request->input('text_content');
        $lesson->media_content = $filename; // Save the filename in the database
        // $lesson->thumbnail = $request->input('thumbnail');
        $lesson->is_public = $request->input('is_public', true);
        $lesson->is_problem = $request->input('is_problem', false);

        $lesson->save();

        // Optionally, you can redirect to a success page or show a success message.
        return redirect()->route('author_course_show', ['id' => $request->get('course_id')])
            ->with('success', 'Lesson created successfully!');
    }

    function update()
    {
        return request()->pathInfo();
    }

    function delete()
    {
        return request()->pathInfo();
    }
}
