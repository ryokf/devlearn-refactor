<?php


use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\CourseController;
use App\Http\Controllers\Author\LessonController;
use App\Http\Controllers\Author\MemberController;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->group(function () {
    Route::controller(AuthorController::class)->group(function () {
        Route::get('', 'dashboard')->name('author_dashboard');
        Route::get('profile', 'showProfile')->name('author_profile');
        Route::get('profile-edit', 'editProfile')->name('author_edit_profile');
        Route::put('profile-edit', 'updateProfile')->name('author_update_profile');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course',  'index')->name('author_course_index');
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
        Route::get('/lesson/{id}', 'index');
        Route::get('/lesson/create', 'create');
        Route::post('/lesson/create', 'store');
        Route::get('/lesson/edit', 'edit');
        Route::put('/lesson/edit', 'update');
        Route::delete('/lesson/delete/{id}', 'delete');
    });

    Route::controller(MemberController::class)->group(function () {
        Route::get('/member',  'index')->name('author_member');
        Route::get('/member/{id}',  'show');
    });
});
