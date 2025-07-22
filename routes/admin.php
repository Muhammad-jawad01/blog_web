<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;


Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Route::get('/', function () {
        //     return view('admin.index');
        // })->name('dashboard');

        Route::resource('users', UserController::class);
        // Route::get('/', [UserController::class, 'index'])->name('users.index');
        //users. index
        //users.create
        //users.store
        //users.show
        //users.edit
        //users.update
        //users.destroy
        Route::resource('contacts', ContactController::class);


        // admin.categories.index
        // admin.categories.create
        // admin.categories.store
        // admin.categories.edit
        // admin.categories.update
        // admin.categories.show
        // admin.categories.destroy

        Route::resource('categories', CategoryController::class)->names('categories');
        // Route::get('/categories', [UserController::class, 'index'])->name('categories.index');

        // Route::post('/user-store', [UserController::class, 'store'])->name('users.store');

        // Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        // Route::put('/user-list/{id}', [UserController::class, 'update'])->name('users.update');
        // Route::get('/user-list', [UserController::class, 'create'])->name('users.create');
        // Route::DELETE('/user-list/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        // Route::get('/user-show/{id} ', [UserController::class, 'show'])->name('users.show');

        Route::resource('employees', EmployeeController::class)->names('employees');
        Route::resource('products', ProductController::class)->names('product');
        Route::resource('posts', PostController::class)->names('posts');
        Route::resource('comments', CommentController::class)->names('comments');
        Route::resource('students', StudentController::class)->names('students');
        Route::resource('educations', EducationController::class)->names('educations');
        Route::resource('clients', ClientController::class)->names('clients');
    }
      

);
