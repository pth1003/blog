<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\AdminController;

//Front-End
Route::redirect('/','frontend');
Route::prefix('frontend')->group(function () {
   Route::get('/', [UserController::class, 'index'])->name('frontend.index');
   Route::get('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
   Route::post('/detail/{id}', [UserController::class, 'detailPost'])->name('frontend.detail');
   Route::get('/page/{id}', [UserController::class, 'pagePost'])->name('frontend.page');
   Route::get('/login', [UserController::class, 'login'])->name('frontend.login');
   Route::get('/register', [UserController::class, 'register'])->name('frontend.register');
   Route::get('/error', [UserController::class, 'error'])->name('frontend.error');
   Route::match(['post', 'get'],'/write', [UserController::class, 'writeBlog'])->name('frontend.write');
});

//Back-End
Route::prefix('backend')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});
