<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Client_typeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\GadgetsController;
use App\Http\Controllers\EmployeeController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Users
// Route::get('/', [UserController::class, 'index']);
// // Route::get('/', [UserController::class, 'users'])->name('getListUser');
// Route::get('/{id}', [UserController::class, 'get'])->name('getUser');
// Route::post('/', [UserController::class, 'store'])->name('postUser');
// Route::post('/{id}', [UserController::class, 'update'])->name('putUser');
// Route::delete('/{id}', [UserController::class, 'delete'])->name('deleteUser');
Route::resource('user', 'UserController');

