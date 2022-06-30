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
    
    //USER START
    Route::prefix('user')->group(function () {

        Route::get('/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
        Route::post('/store', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
        Route::get('/list', ['as' => 'admin.user.list', 'uses' => 'UserController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.user.purge', 'uses' => 'UserController@purge']);
    });
    //USER END

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

     //INSTITUICAO START
     Route::prefix('instituicao')->group(function () {

        Route::get('/create', ['as' => 'admin.instituicao.create', 'uses' => 'InstituicaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.instituicao.edit', 'uses' => 'InstituicaoController@edit']);
        Route::post('/store', ['as' => 'admin.instituicao.store', 'uses' => 'InstituicaoController@store']);
        Route::get('/list', ['as' => 'admin.instituicao.list', 'uses' => 'InstituicaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.instituicao.delete', 'uses' => 'InstituicaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.instituicao.update', 'uses' => 'InstituicaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.instituicao.purge', 'uses' => 'InstituicaoController@purge']);
    });
    //INSTITUICAO END

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

    //FUNCIONARIO START
    Route::prefix('funcionario')->group(function () {

        Route::get('/create', ['as' => 'admin.funcionario.create', 'uses' => 'FuncionarioController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.funcionario.edit', 'uses' => 'FuncionarioController@edit']);
        Route::post('/store', ['as' => 'admin.funcionario.store', 'uses' => 'FuncionarioController@store']);
        Route::get('/list', ['as' => 'admin.funcionario.list', 'uses' => 'FuncionarioController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.funcionario.delete', 'uses' => 'FuncionarioController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.funcionario.update', 'uses' => 'FuncionarioController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.funcionario.purge', 'uses' => 'FuncionarioController@purge']);
        Route::post('/contribuinte', ['as' => 'admin.funcionario.contribuinte', 'uses' => 'FuncionarioController@contribuinte']);
    });
    //FUNCIONARIO END

});