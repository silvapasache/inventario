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
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/login', function(){return view('page.login');})->name('login');
    
*/



Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('login', function(){return view('page.login');})->name('login');
    Route::post('login', 'Auth\LoginController@login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('usuario','UserController');
    Route::resource('grupos', 'RolesController');
    Route::resource('producto', 'ProductoController');
    Route::resource('compra', 'CompraController');
    Route::resource('proveedores', 'ProveedorController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('ventas', 'VentaController');
    Route::resource('prueba', 'PhonesController');
    Route::resource('kardex', 'KardexController');
    Route::get('desboard', 'PanelController@index')->name('desboard');
    Route::get('compra12','CompraController@pdf');
});




