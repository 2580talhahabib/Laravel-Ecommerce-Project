<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Middleware\IsAdmin;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;




// AdminLoginController
Route::get('admin/register', [AdminLoginController::class, 'register'])->name('admin.register');
Route::post('admin/registerauth', [AdminLoginController::class, 'registerauth'])->name('admin.registerauth');
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/loginAuth', [AdminLoginController::class, 'loginAuth'])->name('admin.loginAuth');

// HomeController (with middleware group)
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    // CategoryController
    Route::get('admin/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

});










