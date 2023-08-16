<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonComment;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserLesson;
use App\Services\Member\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    private $coursesService;

    public function __construct(CourseService $coursesService)
    {
        $this->coursesService = $coursesService;
    }

    public function show($id, $chapter)
    {
        //course data mengambil service course service getLesson
        $courseData = $this->coursesService->getLesson($id, $chapter);
        //mengambil user id
        $id_user = Auth::id();
        //mencari user di table users menggunakan id_user
        $user = User::findOrFail($id_user);
        //pengecekan apakah user memiliki course di tabel userCourse
        $userCourse = UserCourse::where('user_id', $id_user)->where('course_id', $id)->where('payment_status', 'sukses')->first();
        //jika role nya author / admin / $userCourse = datanya ada ga di table userCourse
        if ($user->hasRole('author') || $user->hasRole('admin') || $userCourse) {
            //untuk button next chapter
            $nextChapter = $chapter + 1;

            // Query untuk mendapatkan chapter terakhir
            $lastChapter = DB::table('lessons')
                ->where('course_id', $id)
                ->orderBy('chapter', 'desc')
                ->first();

            // Menandai apakah ini chapter terakhir atau bukan
            $isLastChapter = false;
            if ($lastChapter && $chapter == $lastChapter->chapter) {
                $isLastChapter = true;
            }

            $nextChapterExists = DB::table('lessons')
                ->where('course_id', $id)
                ->where('chapter', $nextChapter)
                ->exists();
            if ($user->hasRole('admin') || $user->hasRole('author')) {
                $lessons = $courseData['lessons_all'];
            } else {
                $lessons = $courseData['lessons_member'];
            }
            return view('member.lesson.index', [
                'lessons' => $lessons,
                'lesson_detail' => $courseData['lesson_detail'],
                'course' => $courseData['course'],
                'nextChapter' => $nextChapterExists ? $nextChapter : null,
                'lastChapter' => $isLastChapter,
                'comments' => $courseData['comments'],
                'id_lesson' => Lesson::where('course_id', $id)->where('chapter', $chapter)->first()
            ]);
        } else {
            return redirect()->back()->with('message', 'unpaid');
        }
    }

    public function next($id, $chapter, Request $request)
    {
        //course data mengambil service course service getLesson
        $courseData = $this->coursesService->getLesson($id, $chapter);
        //mengambil user id
        $id_user = Auth::id();
        //mencari user di table users menggunakan id_user
        $user = User::findOrFail($id_user);
        //pengecekan apakah user memiliki course di tabel userCourse
        $userCourse = UserCourse::where('user_id', $id_user)->where('course_id', $id)->where('payment_status', 'sukses')->first();
        //jika role nya author / admin / $userCourse = datanya ada ga di table userCourse
        if ($user->hasRole('author') || $user->hasRole('admin') || $userCourse) {
            //untuk button next chapter
            $nextChapter = $chapter;

            // // Query untuk mendapatkan chapter terakhir
            // $lastChapter = DB::table('lessons')
            //     ->where('course_id', $id)
            //     ->orderBy('chapter', 'desc')
            //     ->first();

            // // Menandai apakah ini chapter terakhir atau bukan
            // $isLastChapter = false;
            // if ($lastChapter && $chapter == $lastChapter->chapter) {
            //     $isLastChapter = true;
            // }

            $nextChapterExists = DB::table('lessons')
                ->where('course_id', $id)
                ->where('chapter', $nextChapter)
                ->exists();

            $user->lessons()->syncWithoutDetaching([
                $request->id_lesson => ['status' => true]
            ]);
            // if ($user->hasRole('admin') || $user->hasRole('author')) {
            //     $lessons = $courseData['lessons_all'];
            // } else {
            //     $lessons = $courseData['lessons_member'];
            // }
            return redirect()->route('lesson.show', [
                'id' => $id,
                'chapter' => $nextChapterExists ? $nextChapter : null,
            ]);
        }
    }

    public function create()
    {
        return view('author.lesson.create', [
            'menu' => parent::$menuSidebarauthor,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'text_content' => 'required|string',
        ]);

        $chapter = Lesson::max('chapter', ['course_id' => $request->course_id]) + 1;

        // $lesson = new Lesson();
        // $lesson->course_id = $request->course_id;
        // $lesson->chapter = $chapter;
        // $lesson->title = $request->input('title');
        // $lesson->description = $request->input('description');
        // $lesson->text_content = $request->input('text_content');

        // $lesson->saveOrFail();

        Lesson::create([
            'course_id' => $request->course_id,
            'chapter' => $chapter,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'media_link' => $request->input('media_link'),
            'text_content' => $request->input('text_content'),
        ]);

        return redirect()->route('course.show', $request->course_id)->with('success', 'Lesson created successfully!');
    }


    public function edit(Request $request)
    {
        $lesson = Lesson::where('id', $request->id)->first();

        return view('author.lesson.edit', [
            'menu' => parent::$menuSidebarauthor,
            'lesson' => $lesson,
        ]);
    }

    public function update(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'chapter' => 'required|integer',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'text_content' => 'required|string',
            'is_public' => 'boolean',
            'is_problem' => 'boolean',
        ]);

        $lesson->course_id = $request->input('course_id');
        $lesson->chapter = $request->input('chapter');
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('description');
        $lesson->text_content = $request->input('text_content');
        $lesson->is_public = $request->input('is_public', true);
        $lesson->is_problem = $request->input('is_problem', false);

        $lesson->save();

        // Optionally, you can redirect to a success page or show a success message.
        return redirect()->route('course.show', ['id' => $lesson->course_id])
            ->with('success', 'Lesson updated successfully!');
    }

    public function delete(Request $request)
    {
        Lesson::where('id', $request->id)->delete();

        return back()->with('success', 'bab berhasil dihapus');
    }
}
