<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentScoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserLessonController;
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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('homepage');
});

Route::controller(AssignmentController::class)->group(function(){

});

Route::controller(AssignmentScoreController::class)->group(function(){

});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/category', 'index')->name('category.index');
    Route::get('/category-course/{id}', 'show')->name('category.show');

    Route::middleware('role:admin')->group(function(){
        Route::get('/category-create', 'create')->name('category.create');
        Route::post('/category', 'store')->name('category.store');
        Route::get('/category-edit', 'edit')->name('category.edit');
        Route::put('/category/{id}', 'update')->name('category.create');
        Route::delete('/category/{id}', 'delete')->name('category.delete');
    });

});

Route::controller(CertificateController::class)->middleware('auth')->group(function(){
    Route::get('/certificate', 'index')->name('certificate.index');
    Route::get('/certificate', 'download')->name('certificate.download');
});

Route::controller(CourseController::class)->group(function(){
    Route::get('/course', 'index')->name('course.index');
    Route::get('/course', 'show')->name('course.show');

    Route::middleware('role:mentor')->group(function(){
        Route::get('/course', 'create')->name('course.create');
        Route::post('/course', 'store')->name('course.store');
        Route::get('/course', 'edit')->name('course.edit');
        Route::put('/course', 'update')->name('course.create');
        Route::delete('/course', 'delete')->name('course.delete');
    });
});

Route::controller(LessonController::class)->group(function(){
    Route::get('/lesson', 'index')->name('lesson.index');
    Route::get('/lesson', 'show')->name('lesson.show');

    Route::middleware('role:mentor')->group(function(){
        Route::get('/lesson', 'create')->name('lesson.create');
        Route::post('/lesson', 'store')->name('lesson.store');
        Route::get('/lesson', 'edit')->name('lesson.edit');
        Route::put('/lesson', 'update')->name('lesson.create');
        Route::delete('/lesson', 'delete')->name('lesson.delete');
    });
});

Route::controller(UserCourseController::class)->group(function(){
    Route::get('/transaction', 'index')->name('transaction');

    Route::middleware('role:member')->group(function(){
        Route::post('/transaction/buy', 'buy')->name('transaction.buy');
    });

    Route::middleware('role:admin')->group(function(){
        Route::put('/transaction/set-status', 'set_status')->name('transaction.set_status');
    });
});

Route::controller(VoucherController::class)->group(function(){
    Route::middleware('role:admin')->group(function(){
        Route::get('/voucher', 'index')->name('voucher.index');
        // Route::get('/voucher-create', 'create')->name('voucher.create');
        Route::post('/voucher', 'store')->name('voucher.store');
        Route::get('/voucher', 'edit')->name('voucher.edit');
        Route::put('/voucher', 'update')->name('voucher.create');
        Route::delete('/voucher', 'delete')->name('voucher.delete');
    });
});

Route::controller(ProfileController::class)->middleware('auth')->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile','edit')->name('profile.edit');
    Route::patch('/profile','update')->name('profile.update');
    Route::delete('/profile','destroy')->name('profile.destroy');
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
    Route::post('/users/{user}/roles',  'giveRole')->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', 'revokeRole')->name('users.roles.revoke');
    Route::post('/users/{user}/permissions',  'givePermission')->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', 'revokePermission')->name('users.permissions.revoke');
});

require __DIR__.'/auth.php';
