<?php

use Carbon\Traits\Rounding;


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
Route::get('/selectclassattnd', function () {
    return view('atd');
});
Route::get('/teachercmt', function () {
    return view('cmt.teachercmt');
});
Route::get('/ttb', function () {
    return view('ttb');
});
Route::get('/prview', function () {
    return view('parentsview.recordsview');
});
Route::get('/pratd', function () {
    return view('parentsview.attendview');
});
Route::get('/prcmt', function () {
    return view('parentsview.cmtview');
});

Route::get('/atdadd', function () {
    return view('attendance.add');
});

Route::get('/selectclassresult', function () {
    return view('resclass');
});
Route::get('/stdres', function () {
    return view('stdview.stdres');
});


Route::resource('records', 'RecordsController');

Route::post('/search', 'RecordsController@search')->name('records.search');
Route::post('/send', 'RecordsController@psend')->name('records.psend');
Route::post('/stdrf', 'RecordsController@stdrf')->name('records.stdrf');
Route::post('/t9', 'RecordsController@t9')->name('records.t9');
Route::post('/t10', 'RecordsController@t10')->name('records.t10');
Route::post('/t9r', 'RecordsController@t9r')->name('records.t9r');
Route::get('/t9rr', 'RecordsController@t9rr')->name('records.t9rr');
Route::post('/t9a', 'RecordsController@t9a')->name('records.t9a');
Route::get('/t9aa', 'RecordsController@t9aa')->name('records.t9aa');
Route::post('/t10r', 'RecordsController@t10r')->name('records.t10r');
Route::get('/t10rr', 'RecordsController@t10rr')->name('records.t10rr');
Route::post('/t10a', 'RecordsController@t10a')->name('records.t10a');
Route::get('/t10aa', 'RecordsController@t10aa')->name('records.t10aa');
Route::post('/patd', 'RecordsController@patd')->name('records.patd');
Route::post('/prcmt', 'RecordsController@prcmt')->name('records.prcmt');
Route::post('/stdres', 'RecordsController@stdres')->name('records.stdres');
Route::post('/cmt9', 'RecordsController@cmt9')->name('records.cmt9');
Route::post('/cmt10', 'RecordsController@cmt10')->name('records.cmt10');
Route::get('/cmtt9', 'RecordsController@cmtt9')->name('records.cmtt9');
Route::get('/cmtt10', 'RecordsController@cmtt10')->name('records.cmtt10');