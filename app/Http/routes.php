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

// Move to auth
Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/login', 'UserController@postLogin');
Route::get('/user/register', 'UserController@getRegister');
Route::post('/user/register', 'UserController@postRegister');
//

/*
 * Blog pages (editing and posting)
 */
Route::get('/blog', 'BlogController@getIndex');

// Add auth group
Route::get('/blog/create', 'BlogController@getCreate');
Route::post('/blog/create', 'BlogController@postCreate');
Route::get('/blog/edit/{id?}', 'BlogController@getEdit');
Route::post('/blog/edit', 'BlogController@postEdit');
//

/*
 * Contact page
 */
Route::get('/contact', 'ContactController@getIndex');

/*
 * Log viewer
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
