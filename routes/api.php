<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoanController;
use App\Http\Controllers\API\GenreController;
   

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [RegisterController::class, 'logout']);
         
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});

Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::apiResource('loans', LoanController::class);
Route::apiResource('genres', GenreController::class);