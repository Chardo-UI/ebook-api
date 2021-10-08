<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/books',[BookController::class, 'index']);
Route::post('/books',[BookController::class, 'store']);
Route::get('/books/{id}',[BookController::class, 'show']);
Route::put('/books/{id}',[BookController::class, 'update']);
Route::delete('/books/{id}',[BookController::class, 'destroy']);
*/

//Route::resource('books', BookController::class)->except('create', 'edit');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('authors', AuthorController::class)->except('create', 'edit', 'store', 'update', 'destroy');
Route::resource('books', BookController::class)->except('create', 'edit', 'store', 'update', 'destroy');

//Sanctum
Route::middleware('auth:sanctum')->group(function () {
    //books
    Route::resource('books', BookController::class)->except('create', 'edit','index','show');

    //author
    Route::resource('authors', AuthorController::class)->except('create', 'edit', 'index', 'show');

    Route::post('/logout', [AuthController::class, 'logout']);
});