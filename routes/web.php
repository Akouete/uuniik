<?php

Route::get('/index', 'PagesController@posts');

Route::get('/connexion', 'PagesController@connexion')->name('connexion');

Route::get('/essai', 'PagesController@essai');

Route::get('/AjaxPages/Posts', 'PagesController@posts');

Route::get('/AjaxPages/Questions', 'PagesController@questions');

Route::get('/AjaxPages/Reponses', 'PagesController@reponses');

Route::get('/AjaxPages/Personnes', 'PagesController@personnes');

Route::get('/AjaxPages/Profile', 'PagesController@profile');

Route::get('/AjaxPages/PersonProfil', 'PagesController@PersonProfil');

Route::get('/AjaxPages/Similar', 'PagesController@similar');

Route::get('/AjaxPages/Decouvrir', 'PagesController@decouvrir');

Route::get('/GoogleLogin', 'PagesController@googlelogin');

Route::get('/Error', 'PagesController@error');

Route::post('/index', 'RegistrationController@create');

Route::post('/AjaxPages/postInterface', 'PagesController@postInterface');

//-------------------------------------------------------------------------------------------
Route::post('/AjaxPages/Profile', 'ProfileController@UpdateProfile')->name('UpdateProfile');

Route::post('/AjaxPages/Profile/like', 'ProfileController@Like')->name('Like');
//-------------------------------------------------------------------------------------------

Route::post('/AjaxPages/PostInterface', 'PostController@Post')->name('Post');

Route::get('/AjaxPages/PostInterface', function () {
    return view('/AjaxPages/PostInterface');
});
































Route::get('/standard/way', function () {
    return view('standard/way');
});
Route::get('/AjaxPages/cgu', function () {
    return view('AjaxPages/cgu');
});
Route::get('/PostsComponent', function () {
    return view('PostsComponent');
});
Route::get('/essai', function () {
    return view('essai');
});
Route::get('/', function () {
    return view('welcome');
});
