<?php

use App\Http\Controllers\Post\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MovieController;
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
//    return view('welcome');
    return 'hello';
});

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

/* CRUD Posts */
Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});


/* CRUD Movies */
Route::get('/movies', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movie.store');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::patch('/movies/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movie.delete');

Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);



Route::get('/my_page', [\App\Http\Controllers\MyPlaceController::class, 'index']);

Route::get('/my_name', [\App\Http\Controllers\MyNameController::class, 'index']);

Route::get('/my_cap_color', [\App\Http\Controllers\MyCapCollorController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
