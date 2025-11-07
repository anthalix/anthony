
<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\FrontuserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StatusController;


Route::get('/animals', [AnimalController::class, 'list']);
Route::get('/animals/{id}', [AnimalController::class, 'show'])->where('id', '[0-9]+');

Route::get('/breeds', [AnimalController::class, 'findBreed']);



Route::get('/dogs', [DogController::class, 'list']);
Route::get('/dog/{id}', [DogController::class, 'show'])->where('id', '[0-9]+');


Route::get('/cats', [CatController::class, 'list']);
Route::get('/cat/{id}', [CatController::class, 'show'])->where('id', '[0-9]+');

Route::get('/status', [StatusController::class, 'list']);
Route::get('/status/{id}', [StatusController::class, 'show'])->where('id', '[0-9]+');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/message', [FrontUserController::class, 'message']);
    Route::get('/frontuser/{id}', [FrontUserController::class, 'show']);
    Route::get('/messages/{user}', [FrontuserController::class, 'index']);
});



route::post('/register', [FrontuserController::class, 'registerPost']);
route::post('/login', [FrontuserController::class, 'loginPost']);
route::get('/logout', [FrontuserController::class, 'logout']);
Route::post('/frontuser/verify', [FrontuserController::class, 'verify']);
Route::post('/register', [FrontuserController::class, 'registerPost']);
Route::post('/login', [FrontuserController::class, 'login']);
