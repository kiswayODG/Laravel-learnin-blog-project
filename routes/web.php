<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;

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
    return view('welcome');
});

Route::get('/dashboard', function () { return view('dashboard');} )->middleware(['auth'])->name('dashboard');

Route::get('/users', [UsersController::class, 'index'])->middleware(['auth', 'admin'])->name('users');
Route::get('/users/profile/{user}', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/{user}', [UsersController::class, 'edit'])->middleware(['auth'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->middleware(['auth'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware(['auth', 'admin'])->name('users.destroy');

Route::resource('posts', PostsController::class);

Route::resource('comments', CommentsController::class);
Route::get('comments/{comment}/report', [CommentsController::class, 'report'])->name('comments.report');

Route::get('/', [FrontController::class, 'welcome']);

require __DIR__.'/auth.php';
