<?php

use App\Http\Controllers\OfficerController;
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
    return view('home');
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('officer', 'OfficerController');
    Route::resource('userAccess', 'UserAccessController');
    Route::resource('product', 'ProductController');
    Route::resource('user', 'UserController');
    Route::resource('bidding', 'BiddingController');
    Route::resource('bidProduct', 'BidProductController');

    Route::get('/history', 'HistoryBiddingController@index');
    Route::put('product/bidding/{id}', 'ProductController@bidding');
});
