<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
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
Route::get('bbs',[BbsController::class,'index']);

Route::post('bbs_add',[BbsController::class,'add']);

Route::get('/delete/{id}',[BbsController::class,'delete']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
