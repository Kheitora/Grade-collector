<?php

use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [GradeController::class, 'index'])->middleware('auth');

Route::get('/admin', [GradeController::class, 'admin'])->middleware('isAdmin');

Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('grades.show')->middleware('isAdmin');

Route::post('/added', [GradeController::class, 'create'])->middleware('isAdmin');

Route::get('/edit/{grade}', [GradeController::class, 'edit'])->name('grades.edit')->middleware('isAdmin');

Route::patch('/update/{grade}', [GradeController::class, 'update'])->name('grades.update')->middleware('isAdmin');

Route::get('/delete/{grade}', [GradeController::class, 'delete'])->name('grades.delete')->middleware('isAdmin');

Route::get('/destroy/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy')->middleware('isAdmin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


