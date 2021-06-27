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






Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') ->middleware('verified');

Route::group(['prefix'=>'Tale'],function (){

    Route::resource('Tales',\App\Http\Controllers\TaleController::class);
    Route::get('/mange','\App\Http\Controllers\TaleController@showAll')->name('Tales.manage');
    Route::post('/comment/{id}','\App\Http\Controllers\TaleController@addComment')->name('Tales.comment');
    Route::delete('/deleteComment/{id}','\App\Http\Controllers\TaleController@deleteComment')->name('Comment.delete');
    Route::put('active/{id}','\App\Http\Controllers\TaleController@active')->name('Tales.active');

    Route::get('/showUser','\App\Http\Controllers\UserController@show')->name('User.show');
    Route::put('/updateUser/{id}','\App\Http\Controllers\UserController@update')->name('User.update');
    Route::delete('/deleteUser/{id}','\App\Http\Controllers\UserController@delete')->name('User.delete');


});
