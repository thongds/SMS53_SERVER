<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/test',function (){
    return view('welcome');
});



Route::group(['namespace' => 'Auth'],function (){
    Route::get('auth/login','AuthController@login')->name('login');
    Route::post('auth/login','AuthController@login')->name('login');
    Route::get('auth/register','AuthController@register')->name('register');
    Route::post('auth/register','AuthController@register')->name('register');
    Route::post('auth/validate','AuthController@validateRegister')->name('validate');
    Route::get('auth/logout','AuthController@logout')->name('logout');
});

/* news controller group */
Route::group(['namespace' => 'Admin\Setting'],function (){
    //setting SubtitleType
    Route::get('admin/subtitletype','SubtitleTypeController@index')->name('get_subtitle_type');
    Route::post('admin/subtitletype','SubtitleTypeController@index')->name('post_subtitle_type');
    //setting language
    Route::get('admin/language','LanguageController@index')->name('get_language');
    Route::post('admin/language','LanguageController@index')->name('post_language');
    //setting category
    Route::get('admin/category','CategoryController@index')->name('get_category');
    Route::post('admin/category','CategoryController@index')->name('post_category');
    //setting ProviderPayment
    Route::get('admin/provider-payment','ProviderPaymentController@index')->name('get_provider_payment');
    Route::post('admin/provider-payment','ProviderPaymentController@index')->name('post_provider_payment');
    //setting role
    Route::get('admin/role','RoleController@index')->name('get_role');
    Route::post('admin/role','RoleController@index')->name('post_role');
    //setting subscribe type
    Route::get('admin/subscribe-type','SubscribeType@index')->name('get_subscribe_type');
    Route::post('admin/subscribe-type','SubscribeType@index')->name('post_subscribe_type');

});
Route::group(['namespace' => 'Admin'],function (){

    Route::get('admin/testadmin', 'TestAdminController@index');
    /* admin route */

});



Route::get('api/news/getnews/{page}','Api\v1\NewsController@getNews')->where('page','[0-9]+');

Route::get('api/news/getsocial/{page}','Api\v1\SocialController@getSocial')->where('page','[0-9]+');









Route::auth();

Route::get('/home', 'HomeController@index');