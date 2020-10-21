<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

use App\Http\Controllers\UsersController;

//Rutas del CRUD AdminLTE
Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/create', [UsersController::class, 'create']);
Route::get('/users/{user}', [UsersController::class, 'show']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{user}/edit', [UsersController::class, 'edit']);
Route::patch('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'destroy']);

//Rutas de la API
Route::get('/api/users', [\App\Http\Controllers\ApiUsersController::class, 'index']);
Route::get('/api/users/{user}', [\App\Http\Controllers\ApiUsersController::class, 'show']);
Route::post('/api/users', [\App\Http\Controllers\ApiUsersController::class, 'store']);
Route::put('/api/users/{user}', [\App\Http\Controllers\ApiUsersController::class, 'update']);
Route::delete('/api/users/{user}', [\App\Http\Controllers\ApiUsersController::class, 'delete']);
