<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\BoshuController;
use App\Http\Controllers\op_homes;
use App\Http\Controllers\homeController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\HopeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\deciController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserjoinController;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\Join2Controller;


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

Route::get('bbs',[BbsController::class,'index'])->name('bbs');
Route::post('bbs_add',[BbsController::class,'add']);
Route::get('/delete/{id}',[BbsController::class,'delete']);




//20230629 岩瀬 home,detail

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


// Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/detail',[detailController::class, 'index'])->name('detail');
Route::get('/',[homeController::class,'index'])->name('home');
// Route::get('/show/{id}',[homeController::class,'show'])->name('home');
Route::get('/show/{id}', [homeController::class, 'show'])->name('home.show');
// Route::get('join/show/', [JoinController::class, 'index'])->name('join.show');
Route::resource('join',JoinController::class);
//Route::post('/user/join', 'JoinController@store')->name('user.join.store');
Route::resource('hope',HopeController::class);
// Route::post('/join/show', function () {
//     session()->put(['id' => '{{$id}}']);
//     return view('join');
// });

Route::get('/op_join',[op_homes::class, 'join2']);
Route::get('/example/{user_id}/{join_id}',[op_homes::class,'join2'])->name('example');
Route::get('/deci/{id}',[op_homes::class,'deci'])->name('op_homes.deci');
//Route::get('info}',[op_homes::class,'info'])->name('info');
Route::resource('Info',InfoController::class);
Route::get('/deci/{user_id}/{created_at}',[deciController::class,'info'])->name('deci.info');

// Route::get('bbs_user',[Bbs_userController::class,'index']);
// Route::get('/detail/{id}',[Bbs_userController::class,'detail']);
Route::post('points/{user_id}/{join_id}', [PointController::class, 'store'])->name('point.store');
Route::get('/Userjoin/{id}',[UserjoinController::class,'index'])->name('userjoin.index');
Route::post('/Userjoin2',[UserjoinController::class,'store'])->name('userjoin.store');
Route::resource('userinfo',UserinfoController::class);
Route::get('/Userjoi',[UserjoinController::class,'usershow'])->name('userjoin.usershow');




 Route::get('/auth/login.blade.php', function () {
     return view('/auth/login');
 });

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:users'])->name('dashboard');







require __DIR__.'/auth.php';


