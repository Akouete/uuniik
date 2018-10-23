<?php

Route::get('/index', 'PagesController@posts');

Route::get('/connexion', 'PagesController@connexion')->name('connexion');

Route::get('/essai', 'PagesController@essai');

Route::get('/Posts', 'PagesController@posts');

Route::get('/Questions', 'PagesController@questions');

Route::get('/Reponses', 'PagesController@reponses');

Route::get('/Personnes', 'PagesController@personnes');

Route::get('/Profile', 'PagesController@profile');

Route::get('/PersonProfil/{user_id}', 'PagesController@PersonProfil');

Route::get('/Similar/{posttype}/{id}', 'PagesController@similar');

Route::get('/Decouvrir', 'PagesController@decouvrir');

Route::get('/GoogleLogin', 'PagesController@googlelogin');

Route::get('/Error', 'PagesController@error');

Route::post('/index', 'RegistrationController@create');

Route::post('/postInterface', 'PagesController@postInterface');

Route::post('/payment', 'PagesController@payment');

//-------------------------------------------------------------------------------------------
Route::post('/Profile', 'ProfileController@UpdateProfile')->name('UpdateProfile');

Route::post('/Profile/like', 'ProfileController@Like')->name('Like');
//-------------------------------------------------------------------------------------------

Route::post('/PostInterface', 'PostController@Post')->name('Post');


Route::get('/PostInterface', function () {
    return view('/AjaxPages/PostInterface');
});

Route::get('/dechainetoi', function () {
    return view('/dechainetoi');
});

Route::get('/apropos', function () {
    return view('/apropos');
});























Route::get('/bigconnerie', function () {
    return view('bigconnerie');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/titrepdf', function () {
    return view('titrepdf');
});

Route::get('/standard/way', function () {
    return view('standard/way');
});
Route::get('/cgu', function () {
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
