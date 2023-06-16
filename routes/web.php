<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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



Route::get('/projects', function () {
    return view('projects');
});

Route::get('/tasks', function () {
    return view('tasks');
});

Route::get('/projects/{project}', function () {
    return view('dashboard');
});
