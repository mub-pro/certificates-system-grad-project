<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentTypesController;
use App\Mail\SharingMail;

Route::get('/', function() {
    return view('home');
})->name('home');


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/account', [UserController::class, 'account'])->name('users.account');

Route::get('/documents', [DocumentController::class, 'index'])-> name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{id}', [DocumentController::class, 'show'])->name('documents.show');
Route::get('/documents/download/{file}', [DocumentController::class, 'download'])->name('documents.download');
Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');



Route::get('/colleges', [CollegeController::class, 'index'])->name('college.index');
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('college.create');
Route::post('/colleges', [CollegeController::class, 'store'])->name('college.store');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/degrees', [DegreeController::class, 'index'])->name('degree.index');
Route::get('/degrees/create', [DegreeController::class, 'create'])->name('degree.create');
Route::post('/degrees', [DegreeController::class, 'store'])->name('degree.store');
Route::delete('/degrees/{id}', [DegreeController::class, 'destroy'])->name('degree.destroy');

Route::get('/types', [DocumentTypesController::class, 'index'])->name('type.index');
Route::get('/types/create', [DocumentTypesController::class, 'create'])->name('type.create');
Route::post('/types', [DocumentTypesController::class, 'store'])->name('type.store');

Route::get('/sharing/{hashid}', function ($hashid){
    return new SharingMail($hashid);
})->name('email.send');