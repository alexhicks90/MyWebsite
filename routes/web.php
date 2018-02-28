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

Route::get('/', 'MainController@index');

Route::post('/minesweeper', 'MinesweeperController@show');
Route::post('/minesweeper/scores', 'MinesweeperController@store');
Route::post('/minesweeper/scores/form', 'MinesweeperController@create');

Route::get('/minesweeper/scores/{difficulty}', 'ScoreController@show');
Route::get('/minesweeper/index', 'MinesweeperController@index');

Route::get('/resume', 'ResumeController@index');