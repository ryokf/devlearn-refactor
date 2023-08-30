<?php

use Illuminate\Support\Facades\Route;

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
