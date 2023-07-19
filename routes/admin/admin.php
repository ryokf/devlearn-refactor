<?php

use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\UserCourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Route::controller(AuthorController::class)->group(function () {
//     Route::get('', 'dashboard')->name('index');
//     Route::get('profile', 'showProfile');
//     Route::get('profile/edit', 'editProfile');
//     Route::put('profile/edit', 'updateProfile');
// });


Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);

    Route::controller(RoleController::class)->group(function () {
        Route::post('/roles/{role}/permissions', 'givePermission')->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', 'revokePermission')->name('roles.permissions.revoke');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::post('/roles/{permission}/roles', 'giveRole')->name('permissions.roles');
        Route::delete('/roles/{permission}/roles/{role}', 'revokeRole')->name('permissions.roles.revoke');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/{user}', 'show')->name('users.show');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy');
        Route::post('/users{user}/roles',  'giveRole')->name('users.roles');
        Route::delete('/users{user}/roles/{role}', 'revokeRole')->name('users.roles.revoke');
        Route::post('/users{user}/permissions',  'givePermission')->name('users.permissions');
        Route::delete('/users{user}/permissions/{permission}', 'revokePermission')->name('users.permissions.revoke');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course', 'index')->name('course.index');
        Route::delete('/course/{course}',  'deleteCourse')->name('course.delete');
        Route::put('/course/{id}', 'editVoucher')->name('course.voucher.edit');
        Route::post('/course/voucher', 'addVoucher')->name('course.voucher.add');
    });

    Route::controller(UserCourseController::class)->group(function () {
        Route::get('userCourse', 'index')->name('userCourse.index');
        Route::put('userCourse/{userCourse}', 'updateStatus')->name('userCourse.update');
    });
});
