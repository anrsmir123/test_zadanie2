<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ins;

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
    return view('welc');
});
Route::get('/2/', function () {
    return view('welcome');
});

Route::post('v2/InsertContact', [ins::class, 'InsertContact']);
Route::post('v2/InsertMain', [ins::class, 'InsertMain']);
Route::post('v2/InsertSdl_cont', [ins::class, 'InsertSdl_cont']);
//Route::get('getApi_Token/', );


