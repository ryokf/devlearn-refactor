<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentScoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonCommentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Spatie\PermissionController;
use App\Http\Controllers\Spatie\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\VoucherController;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
});

Route::controller(AssignmentController::class)->group(function () {
});

Route::controller(AssignmentScoreController::class)->group(function () {
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::get('/category-course/{id}', 'show')->name('category.show');

    //CRUD Category Course by admin

});

Route::controller(CertificateController::class)->middleware('auth|role:member')->group(function () {
    Route::get('/certificate', 'index')->name('certificate.index');
    Route::get('/certificate', 'download')->name('certificate.download');
});

Route::controller(CourseController::class)->group(function () {

    Route::get('/course-all', 'all')->name('course.index.all');
    Route::get('/course-show/{id}', 'show')->name('course.show');
    Route::get('/course/{id}', 'detailCourse')->name('course.detail');
    Route::get('/course', 'index')->middleware('auth')->name('course.index');
    Route::get('/course-search', 'search')->name('course.search');

    Route::middleware('role:author')->group(function () {
        Route::get('/course-create', 'create')->name('course.create');
        Route::post('/course', 'store')->name('course.store');
        Route::get('/course-edit/{id}', 'edit')->name('course.edit');
        Route::put('/course', 'update')->name('course.update');
        Route::delete('/course', 'delete')->name('course.delete');
    });

    //index course
    Route::get('/course-admin', 'indexAdmin')->name('course.index.admin');

    //lihat lesson

});

Route::controller(LessonController::class)->group(function () {
    // Route::get('/lesson', 'show')->middleware('auth')->name('lesson.show');
    Route::get('/lesson/{id}/{chapter}', 'show')->name('lesson.show');
    Route::post('/lesson/{id}/{chapter}', 'next')->name('lesson.next');

    Route::middleware('role:author')->group(function () {
        Route::get('/lesson-create', 'create')->name('lesson.create');
        Route::post('/lesson', 'store')->name('lesson.store');
        Route::get('/lesson-edit', 'edit')->name('lesson.edit');
        Route::put('/lesson', 'update')->name('lesson.update');
        Route::delete('/lesson', 'delete')->name('lesson.delete');
    });
});

Route::controller(LessonCommentController::class)->group(function () {
    Route::post('/lesson-comment', 'store')->name('comment.store');
});

Route::controller(UserCourseController::class)->group(function () {
    Route::get('/transaction', 'index')->name('transaction');

    Route::middleware('role:member')->group(function () {
        Route::post('/transaction/buy', 'buy')->name('transaction.buy');
    });

    // Route::middleware('role:admin')->group(function(){
    //     Route::put('/transaction/set-status', 'set_status')->name('transaction.set_status');
    // });
    Route::middleware(['auth'])->group(function () {
        Route::get('/transaction/free/{id_course}', 'freeCourse')->name('freeCourse');
    });
});

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');

    Route::get('profile-detail/{id}', 'profile-detail')->name('profile.detail');
});

//ini ketika beli course maka pakai ini
Route::get('/attach-data/{id}', function ($id) {
    //course id
    //lesson id yang ada di course
    //user id yg login
    $id_user = Auth::id();
    $user = User::find($id_user);
    //tambah data di userCourse
    UserCourse::create([
        'user_id' => $id_user,
        'course_id' => $id,
        'payment_status' => 'pending',
    ]);
    //cari semua id lesson
    $LessonInCourse = Lesson::where('course_id', $id)->pluck('id');
    //var_dump($LessonInCourse);
    //$user->lessons()->sync([3, 4, 5, 6]);
    $user->lessons()->syncWithoutDetaching($LessonInCourse);
    // $user->lessons()->syncWithoutDetaching([
    //     1 => ['status' => true]
    // ]);

    // foreach ($user->lessons as $lesson) {
    //     var_dump($lesson->pivot->status);
    // }
});

//ini ketika next untuk simpan progress
Route::get('/next/{id}', function ($id) {
    //course id
    //lesson id yang ada di course
    //user id yg login
    $id_user = Auth::id();
    $user = User::find($id_user);
    //tambah data di userCourse
    //cari semua id lesson
    //var_dump($LessonInCourse);
    //$user->lessons()->sync([3, 4, 5, 6]);
    $user->lessons()->syncWithoutDetaching([
        $id => ['status' => true],
    ]);
    $user->lessons()->syncWithoutDetaching([
        1 => ['status' => true],
    ]);
});

// Route::get('/see_proggres/{id_course}', function ($id_course) {
//     $id_user = Auth::id();
//     $user = User::find($id_user);
//     $kriteria = Lesson::where('course_id', $id_course)->pluck('id');
//     // foreach ($lessons->users as $lesson) {
//     //     var_dump($lesson->pivot->status);
//     // }
//     // foreach ($user->lessons as $lesson) {
//     //     var_dump($lesson->pivot->status);
//     // }
//     $lessons = $user->lessons()->whereInPivot('lesson_id', $kriteria)->get();
//     foreach ($lessons as $lesson) {
//         $status = $lesson->pivot->status;
//         var_dump("Lesson ID: {$lesson->id}, Status: {$status}");
//     }
// });

Route::get('/see/{id_course}', function ($id_course) {
    $id_user = Auth::id();
    $user = User::find($id_user);

    $lessons = $user->lessons()->where('course_id', $id_course)->orderBy('chapter')->get();

    foreach ($lessons as $lesson) {
        $status = $lesson->pivot->status;
        echo "Lesson ID: {$lesson->id}, {$lesson->title} Status: {$status}" . '<br>';
    }
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/progress/testing/{id_course}', function ($id_course) {
    $id_user = Auth::id();
    $user = User::find($id_user);

    $lessonIds = $user->lessons()->where('course_id', $id_course)->pluck('id')->toArray();

    $lessons = $user->lessons()
        ->whereIn('lesson_id', $lessonIds)
        ->get();

    $statusCounts = $lessons->groupBy('pivot.status')
        ->map(function ($group) {
            return $group->count();
        });

    $trueCount = $statusCounts->get(true, 0);
    $falseCount = $statusCounts->get(false, 0);

    echo "True Count: {$trueCount}<br>";
    echo "False Count: {$falseCount}<br>";

    $totalLessons = count($lessonIds);
    echo "Total Lessons = {$totalLessons}<br>";

    //presentase progress complete
    $success = intval(($trueCount / $totalLessons) * 100);
    echo $success . "%";
});
