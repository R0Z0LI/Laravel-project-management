<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/users', [UserController::class, 'index']);

Route::get('/', function () {
     return view('dashboard');
});



Route::get('/projects', [ProjectController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/projects/{project}', function () {
    return view('dashboard');
});

Route::get('/users/create', [UserController::class, 'create']);

Route::get('/users/{user}/edit', [UserController::class, 'edit']);

Route::put('/users/{user}', [UserController::class, 'update']);

Route::delete('/users/{user:id}', [UserController::class, 'destroy']);
