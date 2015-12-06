<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Index - Content/home page
 */
Route::get('/', 'ContentController@getIndex');

/*
 * User pages (login, register, control panel)
 */
// Add auth group
Route::get('/user', 'UserController@getIndex');
//

Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/login', 'UserController@postLogin');
Route::get('/user/register', 'UserController@getRegister');
Route::post('/user/register', 'UserController@postRegister');


/*
 * Blog pages (posting)
 */
// Redirect to main page if user manually enters this URL
Route::get('/blog', 'BlogController@getIndex');

// Add auth group
Route::group(['middleware' => 'auth'], function() {
  Route::get('/blog/create', 'BlogController@getCreate');
  Route::post('/blog/create', 'BlogController@postCreate');
});

/*
 * Blog pages (editing)
 */
Route::group(['middleware' => 'authedit'], function() {
  Route::get('/blog/edit/{id?}', 'BlogController@getEdit');
  Route::post('/blog/edit', 'BlogController@postEdit');
});

/*
 * Blog pages (deleting)
 */
Route::group(['middleware' => 'authrole:1'], function() {
  Route::get('/blog/confirm-delete/{id?}', 'BlogController@getConfirmDelete');
  Route::get('/blog/delete/{id?}', 'BlogController@getDelete');
});

/*
 * Contact page
 */
Route::get('/contact', 'ContactController@getIndex');

/*
 * Authentication
 */
 // Show login form
 Route::get('auth/login', 'Auth\AuthController@getLogin');
 // Process login form
 Route::post('auth/login', 'Auth\AuthController@postLogin');
 // Process logout
 Route::get('auth/logout', 'Auth\AuthController@getLogout');
 // Show registration form
 Route::get('auth/register', 'Auth\AuthController@getRegister');
 // Process registration form
 Route::post('auth/register', 'Auth\AuthController@postRegister');


/*
 * Log viewer
 */
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/*
 * Practice viewer
 */
Route::get('/practice', 'PracticeController@getIndex');
