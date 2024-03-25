<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class,  'show'])->name('login');

Route::post('/Send-login', [LoginController::class, 'store'])->name('Send-login');

Route::get('/show-register', [RegisterController::class, 'show'])->name('show-register');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {

    Route::get('/animaux', [AnimalController::class, 'list'])->name('animaux.list');

    Route::get('/animaux/add', [AnimalController::class, 'showAddForm'])->name('animaux.add');

    Route::post('/animaux/add', [AnimalController::class, 'add'])->name('animaux.add');

    Route::put('/animaux/update/{id}', [AnimalController::class, 'update'])->name('animaux.update');

    Route::get('/animaux/edit/{id}', [AnimalController::class, 'edit'])->name('animaux.edit');

    Route::delete('/animaux/{id}', [AnimalController::class, 'delete'])->name('animaux.delete');

    Route::get('/forms', [FormulaireController::class, 'list'])->name('forms.list');

    Route::get('/forms/read/{id}', [FormulaireController::class, 'read'])->name('form.read');

    Route::delete('/form/{id}', [FormulaireController::class, 'delete'])->name('form.delete');

    Route::get('/users-list', [UserController::class, 'list'])->name('users.list');

    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
});
