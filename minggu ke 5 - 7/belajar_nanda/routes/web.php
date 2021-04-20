<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;


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
Route::get('/hello', function() {
    return 'Hello World';
});
Route::get('/belajar', function () {
    echo '<h1>Hello World</h1>';
    echo '<p>Sedang belajar LAravel</p>';
});
Route::get('page/{nomor}', function($nomor){
    return 'Ini Halaman ke-' . $nomor;
});
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('home',[HomeController::class, 'index']);
});
Route::group(['namespace' => 'Backend'], function () {
    Route::get('dashboard',[DashboardController::class, 'index']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['web','auth']], function () {
    Route::group(['namespace' => 'Backend'], function()
    {
        Route::resource('dashboard', DashboardController::class);
    });
});
