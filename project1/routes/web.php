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
use Illuminate\Support\Facades\Auth;
Route::get('/', 'MainController@main');
Route::post('/login', 'AuthenticationController@login');

Route::get('/api/person', 'PersonController@getPeople');
Route::get('/api/person/{id}', 'PersonController@getPerson');
Route::post('/api/person', 'PersonController@createPerson');
Route::delete('/api/person/{id}', 'PersonController@deletePerson');
Route::get('/api/logout', 'AuthenticationController@logout');
Route::get('/api/newPerson', 'PersonController@newPerson');
Route::put('/api/person/{id}', 'PersonController@updatePerson');