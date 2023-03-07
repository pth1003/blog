<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\AdminController;

// =====  Front-End  =====
Route::redirect('/', 'frontend');
Route::prefix('frontend')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('frontend.index');
    Route::get('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
    Route::post('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
    Route::get('/page/{id}', [UserController::class, 'pagePost'])->name('frontend.page');
    Route::get('/error', [UserController::class, 'error'])->name('frontend.error');
    Route::match(['post', 'get'], '/write', [UserController::class, 'writeBlog'])->name('frontend.write');
});


// =====  Back-End  ======
Route::prefix('backend')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('backend.index');

    Route::prefix('permission')->middleware('role:admin')->group(function () {
        Route::match(['get', 'post'],'/edit', [AdminController::class, 'editPermission'])->name('backend.permission.edit');
    });

    Route::prefix('comment')->middleware('permission:edit comment')->group(function () {
        Route::get('/{status}', [AdminController::class, 'comment'])->name('backend.comment.list');
        Route::get('/handle/{id}/del', [AdminController::class, 'handleComment'])->name('backend.comment.del');
        Route::get('/handle/{id}/update', [AdminController::class, 'handleComment'])->name('backend.comment.update');
        Route::get('/handle/confirm', [AdminController::class, 'confirmAllComment'])->name('backend.comment.confirmAll');
    });

    Route::post('/login', [AdminController::class, 'handleLogin'])->name('backend.login');
    Route::get('/login', [AdminController::class, 'formLogin'])->name('backend.loginForm');
    Route::match(['get', 'post'], '/register', [AdminController::class, 'handleRegister'])->name('backend.register');
    Route::get('/logout', [AdminController::class, 'logout'])->name('backend.logout');

    Route::prefix('post')->group(function () {
        Route::get('/{id}', [AdminController::class, 'postManagement'])->name('backend.post.list')->middleware(['permission:list user']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [AdminController::class, 'listUser'])->name('backend.listUser')->middleware(['permission:list user']);
        Route::match(['post', 'get'], '/edit/{id}', [AdminController::class, 'editUser'])->name('backend.editUser')->middleware(['permission:edit user']);
        Route::match(['post', 'get'], '/create', [AdminController::class, 'createUser'])->name('backend.createUser')->middleware(['permission:create user']);
    });

//    Route::match(['get', 'post'],'/edit', [AdminController::class, 'editPermission']);
});



