<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\BoshuController;
use App\Http\Controllers\op_homes;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;


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

//20230629 岩瀬 home,detail
Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/detail',[detailController::class, 'index'])->name('detail');




//Route::get('/boshu', function () {
 //   return view('boshu');
//});

//Route::get('/boshu',[BoshuController::class,'index']);
//Route::get('/op_home',[BoshuController::class,'index']);

//Route::resource('boshu',BoshuController::class);
//Route::post('/boshu',[BoshuController::class,'store']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


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


