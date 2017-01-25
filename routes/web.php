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

Route::group(['namespace' => 'Admin'],function (){

    Route::get('admin/testadmin', 'TestAdminController@index');
    /* admin route */
    //setting role
    Route::get('admin/createRole','SettingController@createRole')->name('get_createRole');
    Route::post('admin/createRole','SettingController@createRole')->name('createRole');
    //setting category
    Route::get('admin/category','CategoryController@index')->name('get_category');
    Route::post('admin/category','CategoryController@index')->name('post_category');
    //setting language
    Route::get('admin/language','LanguageController@index')->name('get_language');
    Route::post('admin/language','LanguageController@index')->name('post_language');

    Route::get('admin','AdminController@index');
    Route::post('admin/login','AdminController@login')->name('admin');
    Route::get('admin/login','AdminController@login')->name('admin');

    Route::get('admin/newssetting','AdminNewsController@index');
    Route::get('admin/listnews','AdminNewsController@listNewsmedia');

    Route::get('admin/addnews','AdminNewsController@addNewspaper');
    Route::post('admin/addnews','AdminNewsController@addNewspaper')->name('addNewspaper');


    Route::get('admin/addnewcategory','AdminNewsController@addNewCategory');
    Route::post('admin/addnewcategory','AdminNewsController@addNewCategory')->name('addNewCategory');


    Route::get('admin/addnewsmedia','AdminNewsController@addNewsMedia');
    Route::post('admin/addnewsmedia','AdminNewsController@addNewsMedia')->name('addNewsMedia');

    /* social media controller */


    Route::get('admin/socialmedia','AdminSocialMediaController@index')->name('list_social');
    Route::get('admin/listsocial','AdminController@listsocial');
    Route::get('admin/addsocial','AdminController@addsocial');
    Route::get('admin/socialsetting','AdminController@socialsetting');

    Route::get('admin/addnewsocial','AdminController@addnewsocial');
    Route::post('admin/addnewsocial','AdminController@addnewsocial')->name('addnewsocial');


    Route::get('admin/addnewfanpage','AdminController@addnewfanpage');
    Route::post('admin/addnewfanpage','AdminController@addnewfanpage')->name('addnewfanpage');

    Route::get('admin/addnewsocialmedia','AdminSocialMediaController@addNewSocialMedia');
    Route::post('admin/addnewsocialmedia','AdminSocialMediaController@addNewSocialMedia')->name('addNewSocialMedia');

});



Route::get('api/news/getnews/{page}','Api\v1\NewsController@getNews')->where('page','[0-9]+');

Route::get('api/news/getsocial/{page}','Api\v1\SocialController@getSocial')->where('page','[0-9]+');









Route::auth();

Route::get('/home', 'HomeController@index');