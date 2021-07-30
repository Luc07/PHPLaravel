<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Usuario@cadastrar')->name('home');
Route::post('/salvar', 'Usuario@salvar')->name('salvar');
Route::get('/edit', 'Usuario@editar')->name('editar');
Route::post('/editSucess', 'Usuario@editarSucesso')->name('editarSucesso');
Route::get('/login', 'Usuario@logar')->name('logar');
Route::post('/loginSucess', 'Usuario@logarSucesso')->name('logarSucesso');
