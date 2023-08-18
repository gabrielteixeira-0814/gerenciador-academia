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
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('deleteUser');
Route::resource('user', 'UserController');

// Employee
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('deleteEmployee');
Route::resource('employee', 'EmployeeController');

// Client_type
Route::get('/delete/{id}', [Client_typeController::class, 'delete'])->name('deleteClient_type');
Route::resource('client_type', 'Client_typeController');

// Client_type
Route::get('/delete/{id}', [GadgetsController::class, 'delete'])->name('deleteGadgets');
Route::resource('gadgets', 'GadgetsController');
