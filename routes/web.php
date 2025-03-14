<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\ClientsController;
// use App\Http\Controllers\Api\ContractorsController;
// use App\Http\Controllers\Api\TasksController;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "api" middleware group. If you are using token
// | authentication, ensure you apply the proper auth middleware.
// |
// */

// // Public routes (if any) can go here

// // Protected API routes using auth:api or your preferred API auth middleware
// // Group routes under basic auth middleware
// Route::middleware('auth.basic.once')->group(function () {
//     // User CRUD endpoints
//     Route::apiResource('users', UsersController::class);

//     // Clients CRUD endpoints
//     Route::apiResource('clients', ClientsController::class);

//     // Contractors CRUD endpoints
//     Route::apiResource('contractors', ContractorsController::class);

//     // Tasks CRUD endpoints
//     Route::apiResource('tasks', TasksController::class);

//     // Additional Tasks endpoints
//     Route::get('/tasks/action', [TasksController::class, 'action'])->name('tasks.action');
//     Route::get('/tasks/get-data', [TasksController::class, 'getClientData'])->name('tasks.getData');
//     Route::get('/tasks/get-contractor-data', [TasksController::class, 'getContractorData'])->name('tasks.getContractorData');

//     // If you have a specific endpoint for retrieving a client name:
//     Route::get('/clients/{id}/name', [ClientsController::class, 'getClientName'])->name('clients.getName');
// });