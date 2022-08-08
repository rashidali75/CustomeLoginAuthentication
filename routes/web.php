<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomLoginController;
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
Route::get('/login',[CustomLoginController::class,'login'])->middleware('alreadyLogin');

Route::get('/registration',[CustomLoginController::class,'registration'])->middleware('alreadyLogin');

Route::post('/register-user',[CustomLoginController::class,'registerUser'])
->name('register-user');

Route::post('/login-user',[CustomLoginController::class,'loginUser'])
->name('login-user');

Route::get('/dashboard',[CustomLoginController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[CustomLoginController::class,'logout']);
