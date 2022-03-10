<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function (){
    return redirect('/home');
});

Route::get('home', [HomeworkController::class, 'home'])->name('home')->middleware('auth');
Route::get('login', [UserController::class, 'login'])->name("login")->middleware("guest");
Route::get('register', [UserController::class, 'register'])->name("register")->middleware("guest");
Route::post('login', [UserController::class, 'authenticate']);
Route::post('register', [UserController::class, 'store']);
Route::post('logout', [UserController::class, 'logout']);

Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'authenticate']);
Route::get('admin', [AdminController::class, 'admin']);
Route::post('admin', [AdminController::class, 'changeTeacher']);

Route::get('teacher/create', [TeacherController::class, 'create']);
Route::post('teacher/create', [TeacherController::class, 'store']);
Route::get('homework/{id}', [HomeworkController::class, 'homework'])->middleware('auth');
Route::post('homework/{id}', [HomeworkController::class, 'store_work'])->middleware('auth');
