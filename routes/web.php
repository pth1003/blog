<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\AdminController;
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

//Front-End
Route::prefix('frontend')->group(function () {
   Route::get('/', [UserController::class, 'index'])->name('frontend.index');
   Route::get('/detail', [UserController::class, 'detailPost'])->name('frontend.detail');
   Route::get('/page', [UserController::class, 'pagePost'])->name('frontend.page');
});


//Back-End
Route::prefix('backend')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});
