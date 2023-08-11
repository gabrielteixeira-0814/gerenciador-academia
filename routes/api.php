<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', function (Request $request) {
//     return 'oola';
// });

    // Users
    Route::prefix('user')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('getListUser');
            Route::get('/{id}', [UserController::class, 'get'])->name('getUser');
            Route::post('/', [UserController::class, 'store'])->name('postUser');
            Route::post('/{id}', [UserController::class, 'update'])->name('putUser');
            Route::delete('/{id}', [UserController::class, 'delete'])->name('deleteUser');
    });
