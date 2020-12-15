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

/*Route::get('/', function () {
    return view('welcome', ['website' => 'Laravel 学院！']);
});*/

Route::view('/', 'welcome', ['website' => 'Why']);

Route::namespace('Home')->get('login', 'PublicController@login');

Route::get('hello/{name}', function(){
    return view('hello');
});

Route::get('url/name', function(){
    return 'My Url ' . route('profile');
})->name('profile');

Route::get('redirect', function(){
    //return redirect()->route('trade_info', ['id'=>2]);
    return redirect()->route('admin.users', ['id'=>2]);
});

Route::name('admin.')->group(function () {
    Route::get('users', function () {
        //echo '路由名称前缀';die;
        return 'My Url ' . route('users');
        // 新的路由名称为 "admin.users"...
    })->name('users');
});


Route::get('trade/index', 'Home\TradeController@index');

Route::get('trade/info/{id}/{fields?}', 'Shop\TradeController@info')->name('trade_info')->middleware('login');

Route::get('user/info', 'Shop\UserController@info');

Route::get('public/info', 'Home\PublicController@info');

Route::namespace('Home')->group(function(){
    Route::get('lg', 'PublicController@login');
});

/*Route::group(['namespace' => 'Home'], function(){
    Route::get('login', 'PublicController@login')->name('unsubscribe');
});*/
