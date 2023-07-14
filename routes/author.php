<?php


use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\CourseController;
use App\Http\Controllers\Author\LessonController;
use App\Http\Controllers\Author\MemberController;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->group(function () {
    Route::controller(AuthorController::class)->group(function () {
        Route::get('', 'dashboard')->name('author_dashboard');
        Route::get('profile', 'showProfile');
        Route::get('profile/edit', 'editProfile');
        Route::put('profile/edit', 'updateProfile');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course',  'index')->name('author_course_index');
        Route::get('/course/serach',  'search');
        Route::get('/course-create',  'create');
        Route::post('/course-create',  'store');
        Route::get('/course/edit',  'edit');
        Route::put('/course/edit',  'update');
        Route::delete('/course/delete',  'delete')->name('author_course_delete');
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

    Route::controller(MemberController::class)->group(function () {
        Route::get('/member',  'index');
        Route::get('/member/{id}',  'show');
    });
});
