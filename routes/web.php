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

// Route::get('/', function () {
//     return view('welcome');
// });

//-----------------For frontend ---------------//


Route::get('logout', 'Auth\LoginController@logout');

$router->group([], function () use ($router)
{
    require(__DIR__ . "/frontend/frontend.php");
});
//---------------------- For backend -------------------//
Route::get('/admin', function () {
    if(Auth::check()){
        if(Auth::user()->isPending() || Auth::user()->isDisabled()) { 
            Auth::logout();
            return redirect('/login')->with('info', 'Insert message here');
        }
        return view('welcome');
    }
    return redirect('/login');
});

// Route::get('general',function() {
// 	return view('layouts/settings/general');
// });
/* ---------- featured image delete -------------- */
Route::post('delete/featuredimg', ['as' => 'delete.fimg','uses' => 'Backend\PageController@destroyfimg']);

/* -----------------------Setting------------- */
Route::get('setting/generals', ['as' => 'setting.general','uses' => 'Backend\SettingController@index']);
Route::get('setting/seo', ['as' => 'setting.seo','uses' => 'Backend\SettingController@seo']);
Route::post('setting/general/store', ['as' => 'setting.general.store','uses' => 'Backend\SettingController@store']);
Route::post('setting/general/storeseo', ['as' => 'setting.general.seo.store','uses' => 'Backend\SettingController@storeseo']);
Route::get('setting/social', ['as' => 'setting.social', 'uses' => 'Backend\SettingController@getSettings']);
Route::post('setting/social/storesocial', ['as' => 'setting.social.store', 'uses' => 'Backend\SettingController@socialstore']);

Route::get('setting/email/notify', ['as' => 'setting.email', 'uses' => 'Backend\EmailController@index']);
Route::post('setting/email/store', ['as' => 'email.store', 'uses' => 'Backend\EmailController@store']);
Route::PATCH('setting/email/update/{id}', ['as' => 'email.update', 'uses' => 'Backend\EmailController@update']);
Route::get('setting/news-events/notify', ['as' => 'setting.news.email', 'uses' => 'Backend\EmailController@newsindex']);

/* Theme Option */
Route::get('theme/setting', ['as' => 'theme.setting','uses' => 'Backend\ThemeOptionController@index']);
Route::post('theme/store', ['as' => 'theme.store','uses' => 'Backend\ThemeOptionController@store']);

/* For Page */
Route::get('page/list', ['as' => 'page.list','uses' => 'Backend\PageController@index']);
Route::get('page/new', ['as' => 'page.new','uses' => 'Backend\PageController@create']);
Route::post('page/store', ['as' => 'page.store','uses' => 'Backend\PageController@store']);
Route::get('page/edit/{id}', ['as' => 'page.edit','uses' => 'Backend\PageController@edit']);
Route::patch('page/update/{id}', ['as' => 'page.update','uses' => 'Backend\PageController@update']);
Route::get('page/delete/{id}', ['as' => 'page.delete','uses' => 'Backend\PageController@destroy']);
Route::get('page/list/{id}', ['as' => 'page.sorting','uses' => 'Backend\PageController@sorting']);


/* For static Block */
Route::get('static/block/list', ['as' => 'static.list','uses' => 'Backend\StaticController@index']);
Route::get('static/block/new', ['as' => 'static.new','uses' => 'Backend\StaticController@create']);
Route::post('static/store', ['as' => 'static.store','uses' => 'Backend\StaticController@store']);
Route::get('static/block/edit/{id}', ['as' => 'static.edit','uses' => 'Backend\StaticController@edit']);
Route::patch('static/update/{id}', ['as' => 'static.update','uses' => 'Backend\StaticController@update']);
Route::get('static/delete/{id}', ['as' => 'static.delete','uses' => 'Backend\StaticController@destroy']);

/* for slider */

Route::get('admin/slider', ['as' => 'slides','uses' => 'Backend\SliderController@index']);
Route::get('slides/create', ['as' => 'slides.create','uses' => 'Backend\SliderController@create']);
Route::post('slider/store', ['as' => 'slider.store','uses' => 'Backend\SliderController@store']);
Route::get('slider/edit/{id}', ['as' => 'slider.edit','uses' => 'Backend\SliderController@edit']);
Route::patch('slider/update/{id}', ['as' => 'slider.update','uses' => 'Backend\SliderController@update']);
Route::get('slider/delete/{id}', ['as' => 'slider.delete','uses' => 'Backend\SliderController@destroy']);

//------For Contact Management ----------//
Route::get('admin/contact', ['as' => 'contact','uses' => 'Backend\ContactController@index']);
Route::get('contact/create', ['as' => 'contact.create','uses' => 'Backend\ContactController@create']);
Route::post('contact/store', ['as' => 'contact.store','uses' => 'Backend\ContactController@store']);
Route::get('contact/edit/{id}', ['as' => 'contact.edit','uses' => 'Backend\ContactController@edit']);
Route::patch('contact/update/{id}', ['as' => 'contact.update','uses' => 'Backend\ContactController@update']);
Route::get('contact/delete/{id}', ['as' => 'contact.delete','uses' => 'Backend\ContactController@destroy']);
// Routes for the menu admin

	// Route::get('menus', 'Backend\MenuController@Index');
	// Route::post('menus/order', 'Backend\MenuController@postIndex');
	// Route::post('menus/new', 'Backend\MenuController@postNew');
	// Route::get('menus/edit/{id}', 'Backend\MenuController@Edit');
	// Route::post('menus/edit/{id}', 'Backend\MenuController@menuEdit');
	// Route::post('menus/delete', 'Backend\MenuController@menuDelete');
   Route::group(['prefix' => '/admin/menus'], function()
{
    // Showing the admin for the menu builder and updating the order of menu items
    Route::get('/', 'Backend\MenuController@Index');
	Route::post('order', 'Backend\MenuController@postIndex');
	Route::post('new', 'Backend\MenuController@postNew');
	Route::get('edit/{id}', 'Backend\MenuController@Edit');
	Route::post('edit/{id}', 'Backend\MenuController@menuEdit');
	Route::post('delete', 'Backend\MenuController@menuDelete');
});

   //News and Events
//Route::resource('newsandevents', 'Backend\NewsAndEventsController');

//Testimonials
//Route::resource('testimonials', 'Backend\TestimonialsController');
//------For Testimonials Management ----------//
Route::get('admin/testimonials', ['as' => 'testimonials','uses' => 'Backend\TestimonialsController@index']);
Route::get('testimonials/create', ['as' => 'testimonials.create','uses' => 'Backend\TestimonialsController@create']);
Route::post('testimonials/store', ['as' => 'testimonials.store','uses' => 'Backend\TestimonialsController@store']);
Route::get('testimonials/edit/{id}', ['as' => 'testimonials.edit','uses' => 'Backend\TestimonialsController@edit']);
Route::patch('testimonials/update/{id}', ['as' => 'testimonials.update','uses' => 'Backend\TestimonialsController@update']);
Route::get('testimonials/delete/{id}', ['as' => 'testimonials.delete','uses' => 'Backend\TestimonialsController@destroy']);

//------For Testimonials Management ----------//
Route::get('admin/events', ['as' => 'events','uses' => 'Backend\NewsAndEventsController@index']);
Route::get('events/create', ['as' => 'events.create','uses' => 'Backend\NewsAndEventsController@create']);
Route::post('events/store', ['as' => 'events.store','uses' => 'Backend\NewsAndEventsController@store']);
Route::get('events/edit/{id}', ['as' => 'events.edit','uses' => 'Backend\NewsAndEventsController@edit']);
Route::patch('events/update/{id}', ['as' => 'events.update','uses' => 'Backend\NewsAndEventsController@update']);
Route::get('events/delete/{id}', ['as' => 'events.delete','uses' => 'Backend\NewsAndEventsController@destroy']);
Route::post('events/imgdelete', ['as' => 'events.imgdelete','uses' => 'Backend\NewsAndEventsController@imgdelete']);

//------For Post Management ----------//
Route::get('admin/post', ['as' => 'post','uses' => 'Backend\PostController@index']);
Route::get('post/create', ['as' => 'post.create','uses' => 'Backend\PostController@create']);
Route::post('post/store', ['as' => 'post.store','uses' => 'Backend\PostController@store']);
Route::get('post/edit/{id}', ['as' => 'post.edit','uses' => 'Backend\PostController@edit']);
Route::patch('post/update/{id}', ['as' => 'post.update','uses' => 'Backend\PostController@update']);
Route::get('post/delete/{id}', ['as' => 'post.delete','uses' => 'Backend\PostController@destroy']);
Route::post('post/imgdelete', ['as' => 'post.imgdelete','uses' => 'Backend\PostController@imgdelete']);
Route::get('post/add/category', ['as' => 'post.add.category','uses' => 'Backend\PostController@addcategory']);
Route::post('post/category/store', ['as' => 'post.store.category','uses' => 'Backend\PostController@storecategory']);
Route::get('post/category/edit/{id}', ['as' => 'category.edit','uses' => 'Backend\PostController@editcategory']);
Route::patch('post/category/update/{id}', ['as' => 'category.update','uses' => 'Backend\PostController@updatecategory']);
Route::get('post/category/delete/{id}', ['as' => 'category.delete','uses' => 'Backend\PostController@deletecategory']);


//----------------------- Country Management-----------------//
Route::get('admin/country', ['as' => 'country','uses' => 'Backend\CountryController@index']);
Route::get('admin/country/create', ['as' => 'admin.country.create','uses' => 'Backend\CountryController@create']);
Route::post('admin/country/store', ['as' => 'admin.country.store','uses' => 'Backend\CountryController@store']);
Route::get('admin/country/edit/{id}', ['as' => 'admin.country.edit','uses' => 'Backend\CountryController@edit']);
Route::patch('admin/country/update/{id}', ['as' => 'admin.country.update','uses' => 'Backend\CountryController@update']);
Route::get('admin/country/delete/{id}', ['as' => 'admin.country.delete','uses' => 'Backend\CountryController@destroy']);

//----------------------- Country Management Section-----------------//
Route::get('admin/country/section', ['as' => 'country.section','uses' => 'Backend\CountryController@section_index']);
Route::get('admin/country/section/create', ['as' => 'admin.country.section.create','uses' => 'Backend\CountryController@section_create']);
Route::post('admin/country/section/store', ['as' => 'admin.country.section.store','uses' => 'Backend\CountryController@section_store']);
Route::get('admin/country/section/edit/{id}', ['as' => 'admin.country.section.edit','uses' => 'Backend\CountryController@section_edit']);
Route::patch('admin/country/section/update/{id}', ['as' => 'admin.country.section.update','uses' => 'Backend\CountryController@section_update']);
Route::get('admin/country/section/delete/{id}', ['as' => 'admin.country.section.delete','uses' => 'Backend\CountryController@section_destroy']);

//----------------------- Country Management Accordion-----------------//
Route::get('admin/country/accordion', ['as' => 'country.accordion','uses' => 'Backend\CountryController@accordion_index']);
Route::get('admin/country/accordion/create', ['as' => 'admin.country.accordion.create','uses' => 'Backend\CountryController@accordion_create']);
Route::post('admin/country/accordion/store', ['as' => 'admin.country.accordion.store','uses' => 'Backend\CountryController@accordion_store']);
Route::get('admin/country/accordion/edit/{id}', ['as' => 'admin.country.accordion.edit','uses' => 'Backend\CountryController@accordion_edit']);
Route::patch('admin/country/accordion/update/{id}', ['as' => 'admin.country.accordion.update','uses' => 'Backend\CountryController@accordion_update']);
Route::get('admin/country/accordion/delete/{id}', ['as' => 'admin.country.accordion.delete','uses' => 'Backend\CountryController@accordion_destroy']);

//----------------------- Country Management Static Block-----------------//
Route::get('admin/country/block', ['as' => 'country.block','uses' => 'Backend\CountryController@block_index']);
Route::get('admin/country/block/create', ['as' => 'admin.country.block.create','uses' => 'Backend\CountryController@block_create']);
Route::post('admin/country/block/store', ['as' => 'admin.country.block.store','uses' => 'Backend\CountryController@block_store']);
Route::get('admin/country/block/edit/{id}', ['as' => 'admin.country.block.edit','uses' => 'Backend\CountryController@block_edit']);
Route::patch('admin/country/block/update/{id}', ['as' => 'admin.country.block.update','uses' => 'Backend\CountryController@block_update']);
Route::get('admin/country/block/delete/{id}', ['as' => 'admin.country.block.delete','uses' => 'Backend\CountryController@block_destroy']);

//------country menus--------//
Route::get('admin/country-menu', ['as' => 'country.menu','uses' => 'Backend\CountryController@country_menu']);
Route::get('admin/country/menu/create', ['as' => 'admin.country.menu.create','uses' => 'Backend\CountryController@countrymenu_create']);
Route::post('admin/country/menu/store', ['as' => 'admin.country.menu.store','uses' => 'Backend\CountryController@countrymenu_store']);
Route::get('admin/country/menu/edit/{id}', ['as' => 'admin.country.menu.edit','uses' => 'Backend\CountryController@countrymenu_edit']);
Route::patch('admin/country/menu/update/{id}', ['as' => 'admin.country.menu.update','uses' => 'Backend\CountryController@countrymenu_update']);
Route::get('admin/country/menu/delete/{id}', ['as' => 'admin.country.menu.delete','uses' => 'Backend\CountryController@countrymenu_destroy']);//------country menus--------//

//----------country universities----------//
Route::get('admin/country/universities', ['as' => 'country.universities','uses' => 'Backend\CountryUniversityController@index']);
Route::get('admin/country/universities/create', ['as' => 'admin.country.universities.create','uses' => 'Backend\CountryUniversityController@create']);
Route::post('admin/country/universities/store', ['as' => 'admin.country.universities.store','uses' => 'Backend\CountryUniversityController@store']);
Route::get('admin/country/universities/edit/{id}', ['as' => 'admin.country.universities.edit','uses' => 'Backend\CountryUniversityController@edit']);
Route::patch('admin/country/universities/update/{id}', ['as' => 'admin.country.universities.update','uses' => 'Backend\CountryUniversityController@update']);
Route::get('admin/country/universities/delete/{id}', ['as' => 'admin.country.universities.delete','uses' => 'Backend\CountryUniversityController@destroy']);

//----------------College-----------------//
Route::get('admin/college', ['as' => 'college','uses' => 'Backend\CollegeController@index']);
Route::get('admin/college/create', ['as' => 'admin.college.create','uses' => 'Backend\CollegeController@create']);
Route::post('admin/college/store', ['as' => 'admin.college.store','uses' => 'Backend\CollegeController@store']);
Route::get('admin/college/edit/{id}', ['as' => 'admin.college.edit','uses' => 'Backend\CollegeController@edit']);
Route::patch('admin/college/update/{id}', ['as' => 'admin.college.update','uses' => 'Backend\CollegeController@update']);
Route::get('admin/college/delete/{id}', ['as' => 'admin.college.delete','uses' => 'Backend\CollegeController@destroy']);


//----------college tab structure----------//
Route::get('admin/collegetab', ['as' => 'collegetab','uses' => 'Backend\CollegeController@indextab']);
Route::get('admin/collegetab/create', ['as' => 'admin.collegetab.create','uses' => 'Backend\CollegeController@createtab']);
Route::post('admin/collegetab/store', ['as' => 'admin.collegetab.store','uses' => 'Backend\CollegeController@storetab']);
Route::get('admin/collegetab/edit/{id}', ['as' => 'admin.collegetab.edit','uses' => 'Backend\CollegeController@edittab']);
Route::patch('admin/collegetab/update/{id}', ['as' => 'admin.collegetab.update','uses' => 'Backend\CollegeController@updatetab']);
Route::get('admin/collegetab/delete/{id}', ['as' => 'admin.collegetab.delete','uses' => 'Backend\CollegeController@destroytab']);

//-----------------University---------------------//
Route::get('admin/university', ['as' => 'university','uses' => 'Backend\UniversityController@index']);
Route::get('admin/university/create', ['as' => 'admin.university.create','uses' => 'Backend\UniversityController@create']);
Route::post('admin/university/store', ['as' => 'admin.university.store','uses' => 'Backend\UniversityController@store']);
Route::get('admin/univesrity/edit/{id}', ['as' => 'admin.university.edit','uses' => 'Backend\UniversityController@edit']);
Route::patch('admin/university/update/{id}', ['as' => 'admin.university.update','uses' => 'Backend\UniversityController@update']);
Route::get('admin/university/delete/{id}', ['as' => 'admin.university.delete','uses' => 'Backend\UniversityController@destroy']);

//------------------Course-------------//
Route::get('admin/course', ['as' => 'course','uses' => 'Backend\CourseController@index']);
Route::get('admin/course/create', ['as' => 'admin.course.create','uses' => 'Backend\CourseController@create']);
Route::post('admin/course/store', ['as' => 'admin.course.store','uses' => 'Backend\CourseController@store']);
Route::get('admin/course/edit/{id}', ['as' => 'admin.course.edit','uses' => 'Backend\CourseController@edit']);
Route::patch('admin/course/update/{id}', ['as' => 'admin.course.update','uses' => 'Backend\CourseController@update']);
Route::get('admin/course/delete/{id}', ['as' => 'admin.course.delete','uses' => 'Backend\CourseController@destroy']);

//------------------Course tab-------------//
Route::get('admin/coursetab', ['as' => 'coursetab','uses' => 'Backend\CourseController@indextab']);
Route::get('admin/coursetab/create', ['as' => 'admin.coursetab.create','uses' => 'Backend\CourseController@createtab']);
Route::post('admin/coursetab/store', ['as' => 'admin.coursetab.store','uses' => 'Backend\CourseController@storetab']);
Route::get('admin/coursetab/edit/{id}', ['as' => 'admin.coursetab.edit','uses' => 'Backend\CourseController@edittab']);
Route::patch('admin/coursetab/update/{id}', ['as' => 'admin.coursetab.update','uses' => 'Backend\CourseController@updatetab']);
Route::get('admin/coursetab/delete/{id}', ['as' => 'admin.coursetab.delete','uses' => 'Backend\CourseController@destroytab']);