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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getSubcategory', 'HomeController@SubCategoryDetails');
Route::post('/getProducts', 'HomeController@ProductDetails');
//Route::post('casestore', [ 'as' => 'caseDataStore','uses'=>'CaseManagementController@store']);
Route::post('/cart',[ 'as' => 'cartDataStore','uses'=>'HomeController@cartDetails']);