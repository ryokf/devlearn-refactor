<?php

namespace App\Http\Controllers;

use App\Models\LessonComment;
use App\Models\LessonCommentReply;
use Illuminate\Http\Request;

class LessonCommentController extends Controller
{
    public function store(Request $request)
    {
        if($request->lesson_comment_id){
            $validatedData = $request->validate([
                'lesson_comment_id' => 'required|exists:lesson_comments,id',
                'reply' => 'required|string',
            ]);

            // Buat instance LessonComment dan isi dengan data yang valid
            $replyComment = new LessonCommentReply();
            $replyComment->user_id = auth()->user()->id;
            $replyComment->lesson_comment_id = $validatedData['lesson_comment_id'];
            $replyComment->reply = $validatedData['reply'];

            // Simpan data ke database
            $replyComment->save();

            // Jika berhasil, Anda bisa melakukan redirect atau memberikan respons sesuai kebutuhan
            return redirect()->back()->with('success', 'reply added successfully');
        }

        // Validasi input dari request
        $validatedData = $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'comment' => 'required|string',
        ]);

        // Buat instance LessonComment dan isi dengan data yang valid
        $lessonComment = new LessonComment();
        $lessonComment->user_id = auth()->user()->id;
        $lessonComment->lesson_id = $validatedData['lesson_id'];
        $lessonComment->comment = $validatedData['comment'];

        // Simpan data ke database
        $lessonComment->save();

        // Jika berhasil, Anda bisa melakukan redirect atau memberikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
