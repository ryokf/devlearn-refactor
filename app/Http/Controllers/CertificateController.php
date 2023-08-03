<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index($course_id, $user_id)
    {
        Certificate::create([
            'user_id' => $user_id,
            'course_id' => $course_id, 'photo' => "kosong"
        ]);
        $certificate = Certificate::where('course_id', $course_id)
            ->where('user_id', $user_id)
            ->first();
        // return view('member.certificates.index', compact('certificate'));
    }

    public function download($course_id, $user_id)
    {
        // $certificate = Certificate::where('course_id', $course_id)
        //     ->where('user_id', $user_id)
        //     ->first();
        // $pdf = PDF::loadView('member.certificates.pdf', compact('certificate'));

        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->stream();
    }
}
