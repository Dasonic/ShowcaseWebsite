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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Projects
Route::resource('/projects', 'ProjectsController');
Route::get('/projects/sorted/{tag_title}', 'ProjectsController@index_with_tag');
// End Projects
Route::resource('/news', 'NewsController');

// Contact
Route::get('/contact', 'ContactController@index');
Route::get('/contact/send', 'MailController@send_contact_message');
// End content

Route::get('contact-form', 'CaptchaServiceController@index');
Route::post('captcha-validation', 'CaptchaServiceController@capthcaFormValidate');
Route::get('reload-captcha', 'CaptchaServiceController@reloadCaptcha');