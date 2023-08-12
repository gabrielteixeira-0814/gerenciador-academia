<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Client_typeController;
use App\Http\Controllers\Api\MaintenanceController;
use App\Http\Controllers\Api\GadgetsController;


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
            Route::get('/', [UserController::class, 'users'])->name('getListUser');
            Route::get('/{id}', [UserController::class, 'get'])->name('getUser');
            Route::post('/', [UserController::class, 'store'])->name('postUser');
            Route::post('/{id}', [UserController::class, 'update'])->name('putUser');
            Route::delete('/{id}', [UserController::class, 'delete'])->name('deleteUser');
    });

    // Client_type
    Route::prefix('client_type')->group(function() {
        Route::get('/', [Client_typeController::class, 'clients_type'])->name('getListClient_type');
        Route::get('/{id}', [Client_typeController::class, 'get'])->name('getClient_type');
        Route::post('/', [Client_typeController::class, 'store'])->name('postClient_type');
        Route::post('/{id}', [Client_typeController::class, 'update'])->name('putClient_type');
        Route::delete('/{id}', [Client_typeController::class, 'delete'])->name('deleteClient_type');
    });

    // Maintenance
    Route::prefix('maintenance')->group(function() {
        Route::get('/', [MaintenanceController::class, 'maintenances'])->name('getListMaintenance');
        Route::get('/{id}', [MaintenanceController::class, 'get'])->name('getMaintenance');
        Route::post('/', [MaintenanceController::class, 'store'])->name('postMaintenance');
        Route::post('/{id}', [MaintenanceController::class, 'update'])->name('putMaintenance');
        Route::delete('/{id}', [MaintenanceController::class, 'delete'])->name('deleteMaintenance');
    });

    // Gadgets
    Route::prefix('gadgets')->group(function() {
        Route::get('/', [GadgetsController::class, 'gadgets'])->name('getListGadgets');
        Route::get('/{id}', [GadgetsController::class, 'get'])->name('getGadgets');
        Route::post('/', [GadgetsController::class, 'store'])->name('postGadgets');
        Route::post('/{id}', [GadgetsController::class, 'update'])->name('putGadgets');
        Route::delete('/{id}', [GadgetsController::class, 'delete'])->name('deleteGadgets');
    });
