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
Route::get('/filter', 'ContentController@getFilter');
Route::post('/filter', 'ContentController@postFilter');

/*
 * Blog pages (posting)
 */
// Redirect to main page if user manually enters this URL
Route::get('/blog', 'BlogController@getIndex');

// Add auth group
Route::group(['middleware' => 'auth'], function() {
  Route::get('/blog/create', 'BlogController@getCreate');
  Route::post('/blog/create', 'BlogController@postCreate');
  Route::get('/user', 'ContentController@getUser');
});

/*
 * Blog pages (editing)
 */
Route::group(['middleware' => 'authedit'], function() {
  Route::get('/blog/edit/{id?}', 'BlogController@getEdit');
  Route::post('/blog/edit', 'BlogController@postEdit');
});

/*
 * Admin pages
 */
Route::group(['middleware' => 'authrole:1'], function() {
  // Deleting
  Route::get('/blog/confirm-delete/{id?}', 'BlogController@getConfirmDelete');
  Route::get('/blog/delete/{id?}', 'BlogController@getDelete');
  // Admin Panel
  Route::get('/admin-panel', 'AdminController@getAdminPanel');
  Route::post('/admin-panel', 'AdminController@postUpdateRoles');
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
