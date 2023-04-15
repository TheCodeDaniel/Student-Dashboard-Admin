<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'index']);

Route::get('/admindash', [AdminController::class, 'admindash'])->name('admin.dash');

Route::get('applicationdetails/{id}', [AdminController::class, 'applicationdetails']);

Route::get('adminAll', [AdminController::class, 'adminAll'])->name('admin.all');

// function routes
Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.login');
Route::get('/logout', [AdminController::class, 'adminlogout']);

Route::get('/confirm/{id}', [AdminController::class, 'confirm']);
Route::get('/decline/{id}', [AdminController::class, 'decline']);
