<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FrontuserController;
use App\Http\Controllers\MessageAdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class,  'show'])->name('login');

Route::post('/Send-login', [LoginController::class, 'store'])->name('Send-login');

Route::get('/show-register', [RegisterController::class, 'show'])->name('show-register');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/verify', [FrontuserController::class, 'verify'])->name('frontuser.verify');







Route::get('/animaux', [AnimalController::class, 'list'])->name('animaux.list');
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageAdminController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{userId}', [MessageAdminController::class, 'show'])->name('admin.messages.show');
    Route::post('/messages/reply', [MessageAdminController::class, 'reply'])->name('admin.messages.reply');

    Route::get('/animaux/add', [AnimalController::class, 'showAddForm'])->name('animaux.add');

    Route::post('/animaux/add', [AnimalController::class, 'add'])->name('animaux.add');

    Route::put('/animaux/update/{id}', [AnimalController::class, 'update'])->name('animaux.update');

    Route::get('/animaux/edit/{id}', [AnimalController::class, 'edit'])->name('animaux.edit');

    Route::delete('/animaux/{id}', [AnimalController::class, 'delete'])->name('animaux.delete');



    Route::get('/users-list', [UserController::class, 'list'])->name('users.list');

    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
});
