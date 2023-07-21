<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\VoucherRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function voucherPayment(VoucherRequest $request, $id)
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
                return Redirect::back()->with('message', 'COURSE SUKSES DITAMBAH');
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

    // public function paymentReceipt(){}
}
