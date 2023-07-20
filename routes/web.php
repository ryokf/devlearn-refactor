<?php


use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\CourseController;
use App\Http\Controllers\Author\LessonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseControllerUser;
use App\Http\Controllers\TransactionController;
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

Route::prefix('member')->group(function () {
    Route::controller(MemberController::class)->group(function () {
        Route::get('', 'dashboard')->name('member_dashboard');
        Route::get('profile', 'showProfile')->name('author_profile');
        Route::get('profile-edit', 'editProfile')->name('author_edit_profile');
        Route::put('profile-edit', 'updateProfile')->name('author_update_profile');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course',  'index')->name('author_course_index');
        Route::get('/course/{id}',  'show')->name('author_course_show');
        Route::get('/course/serach',  'search')->name('author_course_search');
        Route::get('/course-create',  'create')->name('author_course_create');
        Route::post('/course-create',  'store')->name('author_course_store');
        Route::get('/course-edit/{id}',  'edit')->name('author_course_edit');
        Route::put('/course-edit',  'update')->name('author_course_update');
        Route::delete('/course/delete',  'delete')->name('author_course_delete');
        Route::get('/course/{id}/problem',  'solveProblemConfirm')->name('author_course_solveProblemConfirm');
        Route::get('/course/{id}/member',  'member')->name('author_course_member');
    });

    Route::controller(LessonController::class)->group(function () {
        Route::get('/lesson/{id}', 'index')->name('author_lesson_index');
        Route::get('/lesson-create', 'create')->name('author_lesson_create');
        Route::post('/lesson-create', 'store')->name('author_lesson_store');
        Route::get('/lesson-edit/{id}', 'edit')->name('author_lesson_edit');
        Route::put('/lesson-update', 'update')->name('author_lesson_update');
        Route::delete('/lesson-delete', 'delete')->name('author_lesson_delete');
    });

    Route::controller(MemberController::class)->group(function () {
        Route::get('/member',  'index')->name('author_member');
        Route::get('/member/{id}',  'show');
    });
})->middleware(['auth', 'verified', 'role:admin']);


require __DIR__ . '/auth.php';
require __DIR__ . '/admin/admin.php';
require __DIR__ . '/author.php';

Route::get('/', [CategoryController::class, 'index']);
Route::get('category/{id}', [CategoryController::class, 'getCourseCategory'])->name('get.course.category');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/course/detail/{course}', [CourseControllerUser::class, 'detailCourse'])->name('course.detail');
});



Route::middleware('auth', 'role:member')->group(function () {
    Route::get('/course/lesson/{id}/{chapter}',  [CourseControllerUser::class, 'lessonCourseDetail'])->name('course.lesson.detail');

    Route::post('/course/detail/payment/{id}', [TransactionController::class, 'voucherPayment'])->name('payment.voucher');
});
