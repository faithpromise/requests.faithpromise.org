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

Route::post('/tickets', 'TicketsController@store')->name('send');
Route::post('/attachments', 'AttachmentsController@store')->name('send');
Route::get('/email', function () {
    $ticket = new \StdClass;
    $ticket->subject = 'Need some flyers';
    $ticket->message = 'Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don\'t want to be dum.';
    $ticket->postscript = 'Due on: Feb 5, 2018';
    $ticket->name = 'Kyle Gilbert';
    return new App\Mail\TicketCreated($ticket);
});

/** @noinspection PhpVoidFunctionResultUsedInspection */
Route::get('{path?}', ['uses' => 'Controller@index'])->where('path', '.+');
