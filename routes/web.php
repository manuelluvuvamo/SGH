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

// Route::get('/', function () {
//     return view('dash');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dash');
    })->name('dash');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash');
    })->name('dash');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    

     //DEPARTAMENTO START
     Route::prefix('departamento')->group(function () {

        Route::get('/create', ['as' => 'admin.departamento.create', 'uses' => 'DepartamentoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.departamento.edit', 'uses' => 'DepartamentoController@edit']);
        Route::post('/store', ['as' => 'admin.departamento.store', 'uses' => 'DepartamentoController@store']);
        Route::get('/list', ['as' => 'admin.departamento.list', 'uses' => 'DepartamentoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.departamento.delete', 'uses' => 'DepartamentoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.departamento.update', 'uses' => 'DepartamentoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.departamento.purge', 'uses' => 'DepartamentoController@purge']);
    });
    //DEPARTAMENTO END

    //FUNÇÃO START
    Route::prefix('funcao')->group(function () {

        Route::get('/create', ['as' => 'admin.funcao.create', 'uses' => 'FuncaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.funcao.edit', 'uses' => 'FuncaoController@edit']);
        Route::post('/store', ['as' => 'admin.funcao.store', 'uses' => 'FuncaoController@store']);
        Route::get('/list', ['as' => 'admin.funcao.list', 'uses' => 'FuncaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.funcao.delete', 'uses' => 'FuncaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.funcao.update', 'uses' => 'FuncaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.funcao.purge', 'uses' => 'FuncaoController@purge']);
    });
    //FUNÇÃO END

});