<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserCourseController extends Controller
{
    public function buy(Request $request, $id)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        $Course = Course::findOrFail($id);
        if ($user->hasRole('member')) {
            if ($request->token == $Course->voucher->token) {
                UserCourse::create([
                    'user_id' => $user_id,
                    'course_id' => $id,
                    'payment_status' => 'sukses',
                    'payment_receipt' => 'Lunas (Voucher Code)',
                ]);

                return Redirect::route('member_course_index')->with('message', 'COURSE SUKSES DITAMBAH');
            } else {
                return Redirect::back()->with('message', 'COURSE tidak sukses ditambah');
            }
        } else {
            return Redirect::back()->with('message', 'bukan member');
        }
    }

    public function summaryPayment($id, $user_id)
    {
        $user = User::findOrFail($user_id);
        $course = Course::findOrFail($id);
        return view('member.transaction.payment', compact('course'));
    }

    public function freeCourse($id_course)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        $existingCourse = UserCourse::where('user_id', $user_id)->where('course_id', $id_course)->first();

        if ($user->hasRole('member')) {
            if ($existingCourse) {
                return Redirect::route('lesson.show', ['id' => $id_course, 'chapter' => 1]);
            } else {
                UserCourse::create([
                    'user_id' => $user_id,
                    'course_id' => $id_course,
                    'payment_status' => 'sukses',
                    'payment_receipt' => 'Free',
                ]);
                //cari id lesson nya semua
                $LessonInCourse = Lesson::where('course_id', $id_course)->pluck('id');
                //masukan ke table pivot user_id dan lesson_id agar bisa tahu proggres nya
                $user->lessons()->syncWithoutDetaching($LessonInCourse);

                return Redirect::route('course.index');
            }
        } else {
            return Redirect::route('lesson.show', ['id' => $id_course, 'chapter' => 1]);
        }
    }
    // public function payment(Request $paymentRequest)
    // {
    //     $file = $paymentRequest->file('payment_receipt');
    //     $path = time() . '_' . $paymentRequest->name . '.' . $file->getClientOriginalExtension();
    //     $user_id = Auth::id();
    //     Storage::disk('local')->put('public/' . $path, file_get_contents($file));
    //     UserCourse::create([
    //         'user_id' => $user_id,
    //         'course_id' => $paymentRequest->course_id,
    //         'payment_status' => "pending",
    //         'payment_receipt' => $path
    //     ]);

    //     return Redirect::route('member_transaction')->with('message', 'Pembayaran anda sedang di validasi oleh admin');
    // }
    public function enroll()
    {
        $user_id = Auth::id();
    }
}
