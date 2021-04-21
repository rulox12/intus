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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/questions','App\Http\Controllers\QuestionController');
Route::resource('/answers','App\Http\Controllers\AnswerController');
Route::get('/votes', 'App\Http\Controllers\VoteController@index')->name('votes.index');
Route::get('/votes/create/{question}', 'App\Http\Controllers\VoteController@create')->name('votes.create');
Route::get('/votes/store/{question_id}/{answer_id}', 'App\Http\Controllers\VoteController@store')->name('votes.store');
Route::get('/questions/all', 'App\Http\Controllers\QuestionController@all')->name('questions.all');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
