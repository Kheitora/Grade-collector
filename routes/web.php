<?php

use App\Http\Controllers\GradeController;
use App\Models\grade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;


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

Route::post( '/search',[Gradecontroller::class, 'search'])->middleware('auth');

Route::get('/index', [GradeController::class, 'index'])->middleware('auth');

Route::get('/admin', [GradeController::class, 'admin'])->middleware('isAdmin');

Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('grades.show')->middleware('isAdmin');

Route::post('/added', [GradeController::class, 'create'])->middleware('isAdmin');

Route::get('/edit/{grade}', [GradeController::class, 'edit'])->name('grades.edit')->middleware('isAdmin');

Route::patch('/update/{grade}', [GradeController::class, 'update'])->name('grades.update')->middleware('isAdmin');

Route::get('/delete/{grade}', [GradeController::class, 'delete'])->name('grades.delete')->middleware('isAdmin');

Route::get('/destroy/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy')->middleware('isAdmin');

Route::get('/userLogin', [GradeController::class, 'userlogin'])->name('userlogin');

Route::get('/filter', [GradeController::class, 'filter'])->middleware('auth');

Route::patch('/userdata', [GradeController::class, 'userdata'])->name('grades.userdata')->middleware('auth');

Route::get('/secret', [GradeController::class, 'secret'])->name('grades.secret')->middleware('auth');

Route::get('/profile', [GradeController::class, 'profile'])->name('grades.profile')->middleware('auth');

Route::patch('/status/{grade}', [GradeController::class, 'status'])->middleware('isAdmin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


