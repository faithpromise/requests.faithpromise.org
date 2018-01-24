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

use Illuminate\Support\Facades\Route;

Route::post('/tickets', 'TicketsController@send')->name('send');
Route::post('/attachments', 'AttachmentsController@store')->name('send');

/** @noinspection PhpVoidFunctionResultUsedInspection */
Route::get('{path?}', ['uses' => 'Controller@index'])->where('path', '.+');
