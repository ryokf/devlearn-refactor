<?php

use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\UserCourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::post('/roles/{permission}/roles', [PermissionController::class, 'giveRole'])->name('permissions.roles');
    Route::delete('/roles/{permission}/roles/{role}', [PermissionController::class, 'revokeRole'])->name('permissions.roles.revoke');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users{user}/roles', [UserController::class, 'giveRole'])->name('users.roles');
    Route::delete('/users{user}/roles/{role}', [UserController::class, 'revokeRole'])->name('users.roles.revoke');
    Route::post('/users{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::delete('/course/{course}', [CourseController::class, 'deleteCourse'])->name('course.delete');
    Route::get('userCourse', [UserCourseController::class, 'index'])->name('userCourse.index');
});
