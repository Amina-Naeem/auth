<?php

use App\Http\Controllers\WishController;
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
Route::get('/',function(){return view('welcome');});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addWishView',[WishController::class, 'addWish']);
Route::post('/create-post',[WishController::class,'createWish'])->name('wish.create');
Route::get('/wishes',[WishController::class,'getWish'])->name('wish.list');
Route::get('/wishes/{no}',[WishController::class,'getWishDetails']);
Route::get('/delete-wish/{no}',[WishController::class,'deleteWish']);
Route::get('/update-wish/{no}',[WishController::class,'updateWish']);
Route::post('/update-wish-data',[WishController::class,'updateWishData'])->name('wish.update');
