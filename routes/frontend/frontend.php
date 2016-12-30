<?php

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('/{page}','Frontend\HomeController@page')->name('page');
Route::post('/frontend/formsubmit','Frontend\FrontendController@submit');
Route::get('/news-events/{url}','Frontend\FrontendController@newsdetail');

//-----------form submit event single-----------------//
Route::get('/news-form/form','Frontend\FrontendController@newsform');
Route::post('/newsform/submit','Frontend\FrontendController@newssubmit');

//-----------------for country pages -------------//
Route::get('/country/{url}','Frontend\CountryController@index');
Route::get('/country/australia/{url}','Frontend\CountryController@show');
Route::get('/section/australia/{url}','Frontend\CountryController@show_section');
Route::get('/course/searchform',['as' => 'course.search','uses' => 'Frontend\SearchController@index']);
Route::get('/course/search-list',['as' => 'course.search.list','uses' => 'Frontend\SearchController@show']);
Route::get('/course-australia/{slug}',['as' => 'course.detail','uses' => 'Frontend\SearchController@coursedetail']);
Route::get('/college-australia/{slug}',['as' => 'college.detail','uses' => 'Frontend\SearchController@collegedetail']);
