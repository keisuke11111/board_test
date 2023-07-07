<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\BoshuController;
use App\Http\Controllers\op_homes;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\Bbs_userController;
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


Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/detail',[detailController::class, 'index'])->name('detail');


//Route::post('/boshu',[BoshuController::class,'store']);
//Route::get('/boshu', function () {
 //   return view('boshu');
//});

Route::get('/boshu',[BoshuController::class,'index']);
//Route::get('/op_home',[BoshuController::class,'index']);

//Route::resource('boshu',BoshuController::class);
Route::post('/boshu',[BoshuController::class,'store']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('bbs_user',[Bbs_userController::class,'index']);
Route::get('/detail/{id}',[Bbs_userController::class,'detail']);


Route::get('/', function () {
    return view('welcome');
});

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:users'])->name('dashboard');




require __DIR__.'/auth.php';


