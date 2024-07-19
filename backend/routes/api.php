
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\FormulaireController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/animals', [AnimalController::class, 'list']);
Route::get('/animals/{id}', [AnimalController::class,'show'])->where('id', '[0-9]+');

Route::get('/breeds',[AnimalController::class,'findBreed']);



Route::get('/dogs', [DogController::class, 'list']);
//Route::get('/dog/{id}', [DogController::class, 'show'])->where('id', '[0-9]+');


Route::get('/cats', [CatController::class, 'list']);
Route::get('/cat/{id}', [CatController::class, 'show'])->where('id', '[0-9]+');

Route::get('/status', [StatusController::class, 'list']);
Route::get('/status/{id}',[StatusController::class, 'show'])->where('id', '[0-9]+');

route::post('/form', [FormulaireController::class, 'create']);



