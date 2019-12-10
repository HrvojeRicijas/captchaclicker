<?php

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

use App\User;
use App\Role;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});


Route::get('/game', function () {
    return view('clicker/clicker');
});



Route::prefix('admin')->middleware('role:superadministrator|administrator')->group(function () {
    Route::get('/games', 'Gamecontroller@showGames');
    Route::get('/games/{id}', 'Gamecontroller@editGame');
    Route::post('/games/{id}', 'Gamecontroller@saveEditGame');
    Route::get('/users', 'UserController@showUsers');
});

Route::prefix('admin')->middleware('role:superadministrator')->group(function () {
    Route::get('/users/{id}', 'UserController@showUser');
    Route::post('/users/{id}', 'UserController@updateUsers');
});

Route::get('/M', 'Gamecontroller@loadFromMachine');
Route::get('/A', 'Gamecontroller@loadFromAccount');
Route::get('/newgame', 'Gamecontroller@newGame');
Route::get('/game/S', 'Gamecontroller@savegame');

Route::post('/test', 'Auth\CaptchaController@check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
