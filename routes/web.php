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

use App\Http\Controllers\ComplaintController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;

Route::get('/', [ComplaintController::class, 'index']);
Route::get('/complaint/create/{userId}', [ComplaintController::class, 'create'])->middleware('auth');
Route::get('/complaint/{id}', [ComplaintController::class, 'show'])->middleware('auth');
Route::post('/complaint/{userId}', [ComplaintController::class, 'store'])->middleware('auth');

Route::get('/denounce', [UserController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return redirect('/');
});


Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [ComplaintController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/debtor/{id}', [UserController::class, 'showDebtor']);
    Route::patch('/admin/debt/{id}', [UserController::class, 'debtSettled']);
});
