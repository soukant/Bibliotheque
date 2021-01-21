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
    return view('front.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard', 'HomeController@admin')->name('dashboard');


Route::group(['middleware' => ['auth','admin']], function(){ 
 
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
});
});

    Route::get('/role-register','Admin\DashboardController@registred');
    Route::get('/role-edit/{id}','Admin\DashboardController@registredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');
    Route::get('/abouts','Admin\AboutController@index');

    //ROUTES FOR EXAMPLAIRES
    Route::get('/examplaires','ExamplaireController@index');
    Route::post('/examplaires','ExamplaireController@store');
    Route::delete('/examplaires/{id}/delete','ExamplaireController@delete');
    Route::get('/examplaires/{id}/edit','ExamplaireController@edit');
    Route::put('/examplaires/{id}','ExamplaireController@update');
   

    //ROUTES FOR CATEGORIES

    Route::get('/categories','CategorieController@index');
    Route::post('/categories','CategorieController@store');
    Route::delete('/categories/{id}/delete','CategorieController@delete');
    Route::get('/categories/{id}/edit','CategorieController@edit');
    Route::put('/categories/{id}','CategorieController@update');

    //
    Route::get('/livres','LivreController@index');
    Route::post('/livres','LivreController@store');
   /* Route::delete('/categories/{id}/delete','CategorieController@delete');
    Route::get('/categories/{id}/edit','CategorieController@edit');
    Route::put('/categories/{id}','CategorieController@update');*/

