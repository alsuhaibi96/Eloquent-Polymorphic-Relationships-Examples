<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

//One to one polymorphic relationship routes
Route::get('show',[TestController::class,'show']);
Route::get('showUser',[TestController::class,'showUser']);

//One to many polymorphic relationship routes
Route::get('showPostComments',[TestController::class,'showPostComments']);
Route::get('showVideoComments',[TestController::class,'showVideoComments']);
Route::get('showCommmentParent',[TestController::class,'showCommmentParent']);




