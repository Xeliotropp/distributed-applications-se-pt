<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\ContractorsController;
use App\Http\Controllers\Api\TasksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. All routes are protected using
| HTTP Basic Authentication.
|
*/

// Public API homepage (optional)
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API!']);
});

// Group routes under the basic auth middleware
Route::middleware('auth.basic')->group(function () {
    // User CRUD endpoints
    Route::apiResource('users', UsersController::class);

    // Clients CRUD endpoints
    Route::apiResource('clients', ClientsController::class);

    // Contractors CRUD endpoints
    Route::apiResource('contractors', ContractorsController::class);

    // Tasks CRUD endpoints
    Route::apiResource('tasks', TasksController::class);

    // Additional Tasks endpoints
    Route::get('/tasks/action', [TasksController::class, 'action'])->name('tasks.action');
    Route::get('/tasks/get-data', [TasksController::class, 'getClientData'])->name('tasks.getData');
    Route::get('/tasks/get-contractor-data', [TasksController::class, 'getContractorData'])->name('tasks.getContractorData');

    Route::get('/clients/search', [ClientsController::class, 'searchClients']);
    Route::get('/contractors/search', [ContractorsController::class, 'searchContractors']);
    Route::get('/tasks/search', [TasksController::class, 'searchTasks']);

});
