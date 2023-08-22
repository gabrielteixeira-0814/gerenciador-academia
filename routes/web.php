<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::get('logout_web', [LoginController::class, 'logout'])->name('logout_web');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Users
Route::get('getDataUser', [UserController::class, 'getDataUser'])->name('user.getDataUser');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('delete_user');
Route::resource('user', 'UserController');

// Client
Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('delete_client');
Route::resource('client', 'ClientController');

// Employee
Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('delete_employee');
Route::resource('employee', 'EmployeeController');

// Client_type
Route::get('/client_type/delete/{id}', [Client_typeController::class, 'delete'])->name('delete_client_type');
Route::resource('client_type', 'Client_typeController');

// Gadgetsvo tb naGadgetsGadgets
Route::get('/gadgets/delete/{id}', [GadgetsController::class, 'delete'])->name('delete_gadgets');
Route::resource('gadgets', 'GadgetsController');

// Maintenance
Route::get('/maintenance/delete/{id}', [MaintenanceController::class, 'delete'])->name('delete_maintenance');
Route::resource('maintenance', 'MaintenanceController');
