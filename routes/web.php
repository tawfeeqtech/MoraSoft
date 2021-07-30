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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () { //...
    /*
Route::get('/', function () {
    return view('dashboard');
});*/
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('grade', 'GradeController');
    });

    // class room
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('classroom', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
    });

    Route::group(['namespace' => 'Sections'], function () {
        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');

    });


});






