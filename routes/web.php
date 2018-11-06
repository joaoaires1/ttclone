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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/cadastro' , 'Portal\CadastroController@index');
Route::post('/cadastro/store' , 'Portal\CadastroController@store');

Route::get('/home' , 'Portal\HomeController@index')->name('home')->middleware('auth');
Route::post('/home/store', 'Portal\HomeController@store');
Route::get('/home/getPosts', 'Portal\HomeController@getPosts')->middleware('auth');
Route::get('/home/getLastPost', 'Portal\HomeController@getLastPost');

Route::get('/user/{name}' , 'Portal\UserController@index');

Route::get('/login' , 'Portal\LoginController@index')->name('login')->middleware('guest');
Route::post('/login/login', 'Portal\LoginController@login');
Route::get('/login/logout', 'Portal\LoginController@logout');

Route::get('/perfil' , 'Portal\PerfilController@index');
Route::post('/perfil/update' , 'Portal\PerfilController@update');

Route::get('/procurar' , 'Portal\ProcurarController@index');
Route::get('/procurar/getPessoas' , 'Portal\ProcurarController@getPessoas');
Route::get('/procurar/seguir' , 'Portal\ProcurarController@seguir');
Route::get('/procurar/deixar' , 'Portal\ProcurarController@deixar');
