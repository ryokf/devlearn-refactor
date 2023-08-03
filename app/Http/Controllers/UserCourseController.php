<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserCourseController extends Controller
{
    public function voucherPayment(Request $request, $id)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        $Course = Course::findOrFail($id);
        if ($user->hasRole('member')) {
            if ($request->token == $Course->voucher->token) {
                UserCourse::create([
                    'user_id' => $user_id,
                    'course_id' => $id,
                    'payment_status' => "sukses",
                    'payment_receipt' => 'Lunas (Voucher Code)'
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

    public function payment(Request $paymentRequest)
    {
        $file = $paymentRequest->file('payment_receipt');
        $path = time() . '_' . $paymentRequest->name . '.' . $file->getClientOriginalExtension();
        $user_id = Auth::id();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        UserCourse::create([
            'user_id' => $user_id,
            'course_id' => $paymentRequest->course_id,
            'payment_status' => "pending",
            'payment_receipt' => $path
        ]);

        return Redirect::route('member_transaction')->with('message', 'Pembayaran anda sedang di validasi oleh admin');
    }
}
