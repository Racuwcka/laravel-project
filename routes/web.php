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
//    return view('welcome');
    return 'hello';
});

Route::get('/my_page', [\App\Http\Controllers\MyPlaceController::class, 'index']);

Route::get('/my_name', [\App\Http\Controllers\MyNameController::class, 'index']);

Route::get('/my_cap_color', [\App\Http\Controllers\MyCapCollorController::class, 'index']);
