<?php


use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\CourseController;
use App\Http\Controllers\Author\LessonController;
use App\Http\Controllers\Author\MemberController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('author')->group(function () {
    Route::controller(AuthorController::class)->group(function () {
        Route::get('', 'dashboard')->name('author_dashboard');
        Route::get('profile', 'showProfile');
        Route::get('profile/edit', 'editProfile');
        Route::put('profile/edit', 'updateProfile');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course',  'index');
        Route::get('/course/serach',  'search');
        Route::get('/course-create',  'create');
        Route::post('/course-create',  'store');
        Route::get('/course/edit',  'edit');
        Route::put('/course/edit',  'update');
        Route::delete('/course/delete/{id}',  'delete');
        Route::get('/course/{id}/problem',  'solveProblemConfirm');
        Route::get('/course/{id}/member',  'member');
    });

    Route::controller(LessonController::class)->group(function () {
        Route::get('/lesson/{id}', 'index');
        Route::get('/lesson/create', 'create');
        Route::post('/lesson/create', 'store');
        Route::get('/lesson/edit', 'edit');
        Route::put('/lesson/edit', 'update');
        Route::delete('/lesson/delete/{id}', 'delete');
    });

    Route::controller(LessonController::class)->group(function () {
        Route::get('/member',  'index');
        Route::get('/member/{id}',  'show');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin/admin.php';
