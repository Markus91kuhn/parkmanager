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
Auth::routes();
//home//
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

//menu//
Route::get('/menu','HomeController@menu')->name('menu');
    Route::get('/active','HomeController@activecase_show')->name('active');

        Route::post('/activecase', 'HomeController@activecase')->name('activecase');
        Route::post('/active_data', 'HomeController@active_data')->name('active_data');
    Route::get('/pending','HomeController@pending')->name('pending');

    Route::get('/custome', 'HomeController@display_parking')->name('custome');
        Route::get('/new_2',function () {
            return view('new_2');
        });
            Route::post('/new_park', 'HomeController@new_park')->name('new_park');

    Route::get('/part_list','HomeController@display_partner')->name('part_list');
        Route::get('/new_part',function () {
            return view('new_partner');
        });
            Route::post('/new_part', 'HomeController@new_part')->name('new_part');
        Route::post('/show_zip', 'HomeController@show_zip')->name('show_zip');
            Route::post('/add_zip','HomeController@add_zip')->name('add_zip');
            Route::post('/delete_zip','HomeController@delete_zip')->name('delete_zip');

    Route::get('/team','HomeController@team')->name('team');   
        // Route::get('/Register','HomeController@Register')->name('Register');   
//new parking lot//
Route::get('/new',function () {
    return view('new');
});
//existing parking lot//
Route::get('/exist',function () {
    return view('exist');
});
    Route::post('/exist', 'HomeController@exist')->name('exist');//search
        Route::post('/newcase','HomeController@newcase')->name('newcase');//new case
            Route::post('/city_search','HomeController@city_search')->name('city_search');
            Route::post('/complete','HomeController@complete')->name('complete');
Route::get('/accept/{id}','Controller@accept_case')->name('accept_case');

Route::get('/ticket', 'HomeController@ticket')->name('ticket');
Route::post('/comfirm','HomeController@comfirm')->name('comfirm');
// Route::get('/custome',function () {
//     return view('custome');
// });

// Route::get('/search',function () {
//     return view('search');
// });
// Route::post('/test','HomeController@test')->name('test');
//error
Route::get('/new_park', function () {
    return view('error');
});
Route::get('/new_parking', function () {
    return view('error');
});
Route::get('/newcase', function () {
    return view('error');
});
Route::get('/clear-cache', function() {
   $exitCode = Artisan::call('cache:clear');
	Artisan::call('config:clear');
   // return what you want
});



