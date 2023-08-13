<?php

namespace App\Services\Admin;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

class AdminService
{
    public function dashboard()
    {
        // course
        $course = Course::all();
        // jumlah lesson
        $lesson_count = $this->lessonCount($course);

        // member
        $member_count = $this->memberCount($course);

        //penghasilan bulan ini
        $income = $this->incomeThisMonth($course);

        // 5 kursus dengan pembeli terbanyak
        $topBought = $this->topBought();

        // 5 kursus dengan lulusan terbanyak
        $topPass = $this->topPass();

        // jumlah pembeli perbulan
        $buyerPerMonth = $this->buyerPerMonth($course);

        // jumlah lulusan perbulan
        $graduatePerMonth = $this->graduatePerMonth($course);

        //persentase perbandingan jumlah kursus dengan bulan lalu
        $thisMonth = Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n'))->count();
        $lastMonth = Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : Course::where('author_id', auth()->user()->id)->whereMonth('created_at', date('n') - 1)->count();
        $coursePercentage = $this->percentCount($lastMonth, $thisMonth);

        //persentase perbandingan jumlah lesson dengan bulan lalu
        $lessonPercentage = $this->lessonPercentage($course);

        //persentase perbandingan jumlah transaksi dengan bulan lalu
        $transactionPercentage = $this->transactionPercentage($course);

        //persentase penghasilan perbulan
        $incomePercentage = $this->incomePercentage($course);

        $year = date('Y');
        $incomePerMonth = [];

        for ($month = 1; $month <= 12; $month++) {
            $totalIncome = DB::table('user_courses')
                ->join('courses', 'user_courses.course_id', '=', 'courses.id')
                ->where('courses.author_id', auth()->user()->id)
                ->whereMonth('user_courses.created_at', $month)
                ->whereYear('user_courses.created_at', $year)
                // ->where('user_courses.payment_status', true)
                ->sum('courses.price');

            array_push($incomePerMonth, $totalIncome);
        }

        return [
            'coursePercentage' => [$coursePercentage, $coursePercentage > 0 ? true : false],
            'lessonPercentage' => [$lessonPercentage, $lessonPercentage > 0 ? true : false],
            'transactionPercentage' => [$transactionPercentage, $transactionPercentage > 0 ? true : false],
            'incomePercentage' => [$incomePercentage, $incomePercentage > 0 ? true : false],
            'course' => $course,
            'course_top_bought' => $topBought,
            'course_top_pass' => $topPass,
            'lesson_count' => $lesson_count,
            'member_count' => $member_count,
            'income' => $income,
            'buyer_count' => $buyerPerMonth,
            'graduate_count' => $graduatePerMonth,
            'income_per_month' => $incomePerMonth,
        ];
    }

    public function lessonCount($course)
    {
        $lesson = [];
        $lesson_count = 0;
        foreach ($course as $findId) {
            array_push($lesson, Lesson::where('course_id', $findId->id)->get());
        }
        foreach ($lesson as $count) {
            $lesson_count += count($count);
        }

        return $lesson_count;
    }

    public function memberCount($course)
    {
        $member = [];
        $member_count = 0;
        foreach ($course as $findId) {
            array_push($member, UserCourse::where('course_id', $findId->id)->get());
        }
        foreach ($member as $count) {
            $member_count += count($count);
        }

        return $member_count;
    }

    public function incomeThisMonth($course)
    {
        $buyerThisMonth = [];
        $courseBought = [];
        $income = 0;
        foreach ($course as $findId) {
            array_push(
                $buyerThisMonth,
                UserCourse::whereMonth('created_at', date('n'))
                    ->where('course_id', $findId->id)
                    ->get()
            );
        }
        $buyerThisMonth = collect($buyerThisMonth)->flatten()->toArray();
        foreach ($buyerThisMonth as $findCourseId) {
            $id = $findCourseId['course_id'];
            array_push($courseBought, Course::where('id', $id)
                ->get());
        }
        foreach ($courseBought as $findPrice) {
            $income += $findPrice[0]['price'];
        }

        return $income;
    }

    public function buyerPerMonth($course)
    {
        $buyerPerMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $count = 0;
            foreach ($course as $findId) {
                $count += count(UserCourse::whereMonth('created_at', $i)
                    ->whereYear('created_at', date('Y'))
                    ->where('course_id', $findId->id)
                    ->get());
            }
            array_push($buyerPerMonth, $count);
        }

        return $buyerPerMonth;
    }

    public function graduatePerMonth($course)
    {
        $graduatePerMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $count = 0;
            foreach ($course as $findId) {
                $count += count(Certificate::whereMonth('created_at', $i)
                    ->whereYear('created_at', date('Y'))
                    ->where('course_id', $findId->id)
                    ->get());
            }
            array_push($graduatePerMonth, $count);
        }

        return $graduatePerMonth;
    }

    public function percentCount($lastMonthValue, $thisMonthValue)
    {
        // Cek apakah lastMonthValue adalah 0 atau tidak
        if ($lastMonthValue == 0) {
            if ($thisMonthValue == 0) {
                return 0; // Jika thisMonthValue juga 0, maka persentase 0
            } else {
                return 100; // Jika thisMonthValue bukan 0, maka persentase infinity (tidak terhingga)
            }
        }

        return (($thisMonthValue - $lastMonthValue) / $lastMonthValue) * 100;
    }

    public function lessonPercentage($course)
    {
        $LessonThisMonth = [];
        $LessonLastMonth = [];
        $thisMonth = 0;
        $lastMonth = 0;
        foreach ($course as $findId) {
            array_push($LessonThisMonth, Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count());
            array_push($LessonLastMonth, Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : Lesson::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count());
        }
        foreach ($LessonThisMonth as $count) {
            $thisMonth += $count;
        }
        foreach ($LessonLastMonth as $count) {
            $lastMonth += $count;
        }

        return $this->percentCount($lastMonth, $thisMonth);
    }

    public function transactionPercentage($course)
    {
        $transactionThisMonth = [];
        $transactionLastMonth = [];
        $thisMonth = 0;
        $lastMonth = 0;
        foreach ($course as $findId) {
            array_push($transactionThisMonth, UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count() == 0 ? 1 : UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n'))->count());
            array_push($transactionLastMonth, UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count() == 0 ? 1 : UserCourse::where('course_id', $findId->id)->whereMonth('created_at', date('n') - 1)->count());
        }
        foreach ($transactionThisMonth as $count) {
            $thisMonth += $count;
        }
        foreach ($transactionLastMonth as $count) {
            $lastMonth += $count;
        }

        return $this->percentCount($lastMonth, $thisMonth);
    }

    public function incomePercentage($course)
    {
        $thisMonth = 0;
        $lastMonth = 0;
        $incomeThisMonth = [];
        $incomeLastMonth = [];
        $courseBoughtThisMonth = [];
        $courseBoughtLastMonth = [];
        foreach ($course as $findId) {
            array_push(
                $incomeThisMonth,
                UserCourse::whereMonth('created_at', date('n'))
                    ->where('course_id', $findId->id)
                    ->get()
            );
            array_push(
                $incomeLastMonth,
                UserCourse::whereMonth('created_at', date('n') - 1)
                    ->where('course_id', $findId->id)
                    ->get()
            );
        }
        $incomeThisMonth = collect($incomeThisMonth)->flatten()->toArray();
        $incomeLastMonth = collect($incomeLastMonth)->flatten()->toArray();
        foreach ($incomeThisMonth as $findCourseId) {
            $id = $findCourseId['course_id'];
            array_push($courseBoughtThisMonth, Course::where('id', $id)
                ->get());
        }
        foreach ($incomeLastMonth as $findCourseId) {
            $id = $findCourseId['course_id'];
            array_push($courseBoughtLastMonth, Course::where('id', $id)
                ->get());
        }

        $incomeThisMonth = 0;
        $incomeLastMonth = 0;
        foreach ($courseBoughtThisMonth as $findPrice) {
            $incomeThisMonth += $findPrice[0]['price'];
        }
        foreach ($courseBoughtLastMonth as $findPrice) {
            $incomeLastMonth += $findPrice[0]['price'];
        }

        return $this->percentCount($incomeLastMonth, $incomeThisMonth);
    }

    public function topBought()
    {
        $courseIds = Course::all()
            ->pluck('id');

        $topBought = UserCourse::whereIn('course_id', $courseIds)
            ->select('course_id', DB::raw('COUNT(*) as total'))
            ->groupBy('course_id')
            ->whereMonth('created_at', date('n'))
            ->orderByDesc('total')
            ->orderBy('course_id')
            ->limit(5)
            ->get();

        $courseIdsTopBought = $topBought->pluck('course_id');

        // Cek apakah ada data course yang termasuk dalam topBought.
        if ($courseIdsTopBought->isEmpty()) {
            // Tidak ada data yang ditemukan, lakukan penanganan khusus di sini,
            // misalnya mengembalikan pesan error atau mengambil course lain sebagai alternatif.
            // Contoh: return Course::whereIn('id', $courseIds)->get();
            // Atau:
            return [];
        } else {
            // Ada data yang ditemukan, ambil course yang sesuai.
            return Course::whereIn('id', $courseIdsTopBought)
                ->whereIn('id', $courseIds)
                ->orderBy(DB::raw('FIELD(id, ' . $courseIdsTopBought->implode(',') . ')'))
                ->get();
        }
    }

    public function topPass()
    {
        $courseIds = Course::all()
            ->pluck('id');

        $topPass = Certificate::whereIn('course_id', $courseIds)
            ->select('course_id', DB::raw('COUNT(*) as total'))
            ->groupBy('course_id')
            ->whereMonth('created_at', date('n'))
            ->orderBy('total')
            ->orderBy('course_id')
            ->limit(5)
            ->get();

        $courseIdsTopPass = $topPass->pluck('course_id');

        // Cek apakah ada data course yang termasuk dalam topPass.
        if ($courseIdsTopPass->isEmpty()) {
            // Tidak ada data yang ditemukan, lakukan penanganan khusus di sini,
            // misalnya mengembalikan pesan error atau mengambil course lain sebagai alternatif.
            // Contoh: return Course::whereIn('id', $courseIds)->get();
            // Atau:
            return [];
        } else {
            // Ada data yang ditemukan, ambil course yang sesuai.
            return Course::whereIn('id', $courseIdsTopPass)
                ->whereIn('id', $courseIds)
                ->orderBy(DB::raw('FIELD(id, ' . $courseIdsTopPass->implode(',') . ')'))
                ->get();
        }
    }
}
