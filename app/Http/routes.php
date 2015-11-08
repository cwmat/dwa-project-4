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
Route::controller('/', 'ContentController', []);//, [
  // 'getLoremIpsumGenerator' => 'tools.getLorem',
  // 'getRandomUserGenerator' => 'tools.getUser',
  // 'postLoremIpsumGenerator' => 'tools.postLorem',
  // 'postRandomUserGenerator' => 'tools.postUser',
//]);

/*
 * User pages (login, register, control panel)
 */
Route::controller('/user', 'UserController', []);

/*
 * Contact page
 */
Route::controller('/contact', 'ContactController', [
  // 'getLoremIpsumGenerator' => 'tools.getLorem',
  // 'getRandomUserGenerator' => 'tools.getUser',
  // 'postLoremIpsumGenerator' => 'tools.postLorem',
  // 'postRandomUserGenerator' => 'tools.postUser',
]);

/*
 * Log viewer
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
