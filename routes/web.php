<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\Permission\PermissionsController;

// =====  Front-End  =====
Route::redirect('/', 'frontend');
Route::prefix('frontend')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('frontend.index');
    Route::get('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
    Route::post('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
    Route::get('/page/{id}', [UserController::class, 'pagePost'])->name('frontend.page');
    Route::get('/error', [UserController::class, 'error'])->name('frontend.error');
    Route::match(['post', 'get'], '/write', [UserController::class, 'writeBlog'])->name('frontend.write')->middleware('permission:create post');
    Route::match(['post', 'get'], '/edit/{id}', [UserController::class, 'editBlog'])->name('frontend.edit')->middleware('permission:edit post');
    Route::get('/delete/{id}', [UserController::class, 'deleteBlog'])->name('frontend.delete')->middleware('permission:delete post');
});


// =====  Back-End  ======
Route::prefix('backend')->group(function () {
    Route::post('/login', [AdminController::class, 'handleLogin'])->name('backend.login');
    Route::get('/login', [AdminController::class, 'formLogin'])->name('backend.loginForm');
    Route::get('/register', [AdminController::class, 'formRegister'])->name('backend.formRegister');
    Route::post('/register', [AdminController::class, 'handleRegister'])->name('backend.register');
    Route::get('/logout', [AdminController::class, 'logout'])->name('backend.logout');

//    Route::middleware('checkLogin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('backend.index');

    Route::prefix('permission')->middleware('role:admin')->group(function () {
        Route::match(['get', 'post'], '/edit/{id}', [PermissionsController::class, 'editPermission'])->name('backend.permission.edit');
        Route::get('/list', [PermissionsController::class, 'permissionList'])->name('backend.permission.list');
    });

    Route::prefix('role')->middleware('role:admin')->group(function () {
        Route::match(['get', 'post'], '/add', [PermissionsController::class, 'addRole'])->name('backend.role.add');
    });

    Route::prefix('comment')->middleware('permission:edit comment')->group(function () {
        Route::get('/{status}', [CommentController::class, 'comment'])->name('backend.comment.list');
        Route::get('/handle/{id}/del', [CommentController::class, 'deleteComment'])->name('backend.comment.del');
        Route::get('/handle/{id}/update', [CommentController::class, 'handleComment'])->name('backend.comment.update');
        Route::get('/handle/confirm', [CommentController::class, 'confirmAllComment'])->name('backend.comment.confirmAll');
        Route::get('/detailComment/{id}', [CommentController::class, 'detailComment'])->name('backend.comment.detailComment');
    });


    Route::prefix('post')->group(function () {
        Route::get('/{id}', [PostController::class, 'postManagement'])->name('backend.post.list')->middleware(['permission:list post']);
        Route::match(['get', 'post'], '/edit/{id}', [PostController::class, 'editPost'])->name('backend.post.edit')->middleware(['permission:edit post']);
        Route::match(['get', 'post'], 'add/add/', [PostController::class, 'addPost'])->name('backend.post.add')->middleware(['permission:create post']);
        Route::match(['get', 'post'], 'del/delete/{id}', [PostController::class, 'deletePost'])->name('backend.post.delete')->middleware(['permission:delete post']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UsersController::class, 'listUser'])->name('backend.listUser')->middleware(['permission:list user']);
        Route::match(['post', 'get'], '/edit/{id}', [UsersController::class, 'editUser'])->name('backend.editUser')->middleware(['permission:edit user']);
        Route::get('/create', [UsersController::class, 'createUser'])->name('backend.createUser')->middleware(['permission:create user']);
        Route::post('/create', [UsersController::class, 'handleCreateUser'])->middleware(['permission:create user']);
        Route::get('/delete/{id}', [UsersController::class, 'deleteUser'])->name('backend.deleteUser')->middleware(['permission:delete user']);
    });
//    });

});



