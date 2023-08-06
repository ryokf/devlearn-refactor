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
use App\Models\Lesson;
use App\Models\User;
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

Route::middleware('role:admin')->group(function () {
    Route::middleware('can:manage category')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            //show all category
            Route::get('/category-admin', 'indexAdmin')->name('category.index.admin');
            //create category
            Route::post('/category', 'store')->name('category.add');
            //delete category
            Route::delete('/category/{id}', 'delete')->name('category.delete');
            //go to edit form category
            Route::get('/category-edit/{id}', 'edit')->name('category.edit');
            //update category
            Route::put('/category/{id}', 'update')->name('category.update');
        });
    });
    Route::middleware('can:manage voucher')->group(function () {
        Route::controller(VoucherController::class)->group(function () {
            //voucher add
            Route::post('/voucher', 'store')->name('voucher.store');
            // voucher delete
            Route::delete('/voucher/{id}', 'delete')->name('voucher.delete');
            //buat ke halaman tambah voucher ke course
            Route::get('/voucher/{id}', 'edit')->name('course.voucher.edit');
            //add ke database voucher
            Route::put('/voucher/{id}', 'update')->name('course.voucher.update');
        });
    });



    Route::middleware('can:manage roles_permission')->group(function () {
        //resource roles spatie
        Route::resource('/roles', RoleController::class);
        //resource permission spatie
        Route::resource('/permissions', PermissionController::class);

        Route::controller(RoleController::class)->group(function () {
            //give permission to role
            Route::post('/roles/{role}/permissions', 'givePermission')->name('roles.permissions');
            //revoke / remove permission from role
            Route::delete('/roles/{role}/permissions/{permission}', 'revokePermission')->name('roles.permissions.revoke');
        });

        Route::controller(PermissionController::class)->group(function () {
            //give role to permission
            Route::post('/roles/{permission}/roles', 'giveRole')->name('permissions.roles');
            //revoke / remove role from permission
            Route::delete('/roles/{permission}/roles/{role}', 'revokeRole')->name('permissions.roles.revoke');
        });
    });

    Route::middleware('can:manage user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            //show all users
            Route::get('/users', 'index')->name('users.index');
            //show 1 specific user
            Route::get('/users/{user}', 'show')->name('users.show');
            //delete user account
            Route::delete('/users/{user}', 'destroy')->name('users.destroy');
            //giving roles to user
            Route::post('/users/{user}/roles', 'giveRole')->name('users.roles');
            //revoke / remove roles from user
            Route::delete('/users/{user}/roles/{role}', 'revokeRole')->name('users.roles.revoke');
            //give permissions to user
            Route::post('/users/{user}/permissions', 'givePermission')->name('users.permissions');
            //revoke / remove permissions from user
            Route::delete('/users/{user}/permissions/{permission}', 'revokePermission')->name('users.permissions.revoke');
        });
    });

    Route::middleware('can:manage course')->group(function () {
        Route::controller(CourseController::class)->group(function () {
            //show all course and voucher in dashboard admin
            Route::get('/course-admin', 'indexAdmin')->name('course.index.admin');
        });
    });

    //index course

});

Route::get('/testing', function () {
    $user = User::with('userLesson')->findOrFail(2);
    //$user1 = $user->userLesson->status;
    // dd($user);
    $lesson = Lesson::with('userLesson')->findOrFail(1);

    dd($lesson->userLesson[0]->status);
});


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

});

Route::controller(LessonController::class)->group(function () {
    //Route::get('/lesson', 'show')->middleware('auth')->name('lesson.show');
    Route::get('/lesson/{id}/{chapter}', 'show')->name('lesson.index');

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



Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});



require __DIR__ . '/auth.php';
