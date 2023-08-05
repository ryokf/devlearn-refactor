<?php

use App\Http\Controllers\Spatie\RoleController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentScoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Spatie\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\VoucherController;
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
    Route::middleware('role:admin')->group(function () {
        Route::get('/category-admin', 'indexAdmin')->middleware('can:view category')->name('category.index.admin');
        Route::post('/category', 'store')->middleware('can:create category')->name('category.add');
        Route::delete('/category/{id}', 'delete')->middleware('can:delete category')->name('category.delete');
        Route::get('/category-edit/{id}', 'edit')->middleware('can:edit category')->name('category.edit');
        Route::put('/category/{id}', 'update')->middleware('can:edit category')->name('category.update');
    });
});

Route::controller(CertificateController::class)->middleware('auth|role:member')->group(function () {
    Route::get('/certificate', 'index')->name('certificate.index');
    Route::get('/certificate', 'download')->name('certificate.download');
});

Route::controller(CourseController::class)->group(function () {

    Route::get('/course-all', 'all')->name('course.index.all');
    Route::get('/course-show/{id}', 'show')->name('course.show');
    
    Route::get('/course', 'index')->middleware('auth')->name('course.index');

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
    Route::get('/course-admin/{id}', 'edit')->name('course.detail');
});

Route::controller(LessonController::class)->group(function () {
    Route::get('/lesson', 'show')->middleware('auth')->name('lesson.show');

    Route::middleware('role:author')->group(function () {
        Route::get('/lesson-create', 'create')->name('lesson.create');
        Route::post('/lesson', 'store')->name('lesson.store');
        Route::get('/lesson-edit', 'edit')->name('lesson.edit');
        Route::put('/lesson', 'update')->name('lesson.update');
        Route::delete('/lesson', 'delete')->name('lesson.delete');
    });
});

Route::controller(UserCourseController::class)->group(function () {
    Route::get('/transaction', 'index')->name('transaction');

    Route::middleware('role:member')->group(function () {
        Route::post('/transaction/buy', 'buy')->name('transaction.buy');
    });

    // Route::middleware('role:admin')->group(function(){
    //     Route::put('/transaction/set-status', 'set_status')->name('transaction.set_status');
    // });
});

Route::controller(VoucherController::class)->middleware('role:admin')->group(function () {

    //voucher add
    Route::post('/voucher', 'store')->name('voucher.store');
    // voucher delete
    Route::delete('/voucher/{id}', 'delete')->name('voucher.delete');
    //buat ke halaman tambah voucher ke course
    Route::get('/voucher/{id}', 'edit')->name('course.voucher.edit');
    //add ke database voucher
    Route::put('/voucher/{id}', 'update')->name('course.voucher.update');
});

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

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
    Route::post('/users/{user}/roles', 'giveRole')->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', 'revokeRole')->name('users.roles.revoke');
    Route::post('/users/{user}/permissions', 'givePermission')->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', 'revokePermission')->name('users.permissions.revoke');
});

require __DIR__ . '/auth.php';
