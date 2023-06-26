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
Route::get('/', [UserController::class, 'login']);

Route::post('users/authenticate', [UserController::class, 'authenticate']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/projects', [ProjectController::class, 'store']);

Route::post('/tasks', [TaskController::class,'store']);



Route::get('/users/create', [UserController::class, 'create']);

Route::get('/tasks/create', [TaskController::class, 'create']);

Route::get('/projects/create', [ProjectController::class, 'create']);

Route::get('/users/{user}/edit', [UserController::class, 'edit']);

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);

Route::get('/projects/{project}/edit', [ProjectController::class, 'edit']);

Route::put('/users/{user}', [UserController::class, 'update']);

Route::put('/tasks/{task}', [TaskController::class, 'update']);

Route::put('/projects/{project}', [ProjectController::class, 'update']);

Route::put('/users/{user}/suspend', [UserController::class, 'suspend']);

Route::put('/tasks/{task}/archive', [TaskController::class, 'archive']);

Route::put('/projects/{project}/archive', [ProjectController::class, 'archive']);

Route::delete('/users/{user:id}', [UserController::class, 'destroy']);

Route::delete('/tasks/{task:id}', [TaskController::class, 'destroy']);

Route::delete('/projects/{project:id}', [ProjectController::class, 'destroy']);

Route::get('/projects/{project:id}/details', [ProjectController::class, 'details']);

