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
    ],
    function () {
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // });

        //========DASHBOARD=========
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');


        //========Domaine=========
        Route::group(['namespace' => 'Domaines'], function () {
            Route::resource('Domaines', 'DomaineController');
        });


        //========Themes=========
        Route::group(['namespace' => 'Themes'], function () {
            Route::resource('Themes', 'ThemeController');
            Route::post('delete_all', 'ThemeController@delete_all')->name('delete_all');
            Route::post('Filter_Classes', 'ThemeController@Filter_Classes')->name('Filter_Classes');
        });

        //========Library=========
        Route::group(['namespace' => 'Libraries'], function () {
            Route::resource('library','LibraryController');
            Route::get('/classes/{id}', 'LibraryController@getclasses');
            Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        });

        //========Exam=========
        Route::group(['namespace' => 'Exams'], function () {
            Route::resource('Exams','ExamController');
        });

        //========Question=========
        Route::group(['namespace' => 'Questions'], function () {
            Route::resource('questions','QuestionController');
        });

        //========Candidat Exam=========
        Route::group(['namespace' => 'Candidat'], function () {
            Route::resource('candidat_exams','CandidatExamController');
        });


    }
);
