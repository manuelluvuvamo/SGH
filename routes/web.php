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
        Route::put('/update/{id}/profile', ['as' => 'admin.user.update.profile', 'uses' => 'UserController@updateProfile']);
        Route::put('/update/{id}/pass', ['as' => 'admin.user.update.pass', 'uses' => 'UserController@updatePass']);
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
        Route::get('/ver/{id}', ['as' => 'admin.funcionario.ver', 'uses' => 'FuncionarioController@ver']);
        Route::get('/add/{id}/experiencia', ['as' => 'admin.funcionario.addExperiencia', 'uses' => 'FuncionarioController@addExperiencia']);
        Route::get('/add/{id}/formacao', ['as' => 'admin.funcionario.addFormacao', 'uses' => 'FuncionarioController@addFormacao']);
        Route::get('/add/{id}/admissao', ['as' => 'admin.funcionario.addAdmissao', 'uses' => 'FuncionarioController@addAdmissao']);

        Route::post('/contribuinte', ['as' => 'admin.funcionario.contribuinte', 'uses' => 'FuncionarioController@contribuinte']);
        
    });
    //FUNCIONARIO END

    //EXPERIENCIA START
    Route::prefix('experiencia')->group(function () {

   
        Route::get('/create', ['as' => 'admin.experiencia.create', 'uses' => 'ExperienciaController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.experiencia.edit', 'uses' => 'ExperienciaController@edit']);
        Route::post('/store', ['as' => 'admin.experiencia.store', 'uses' => 'ExperienciaController@store']);
        Route::get('/list', ['as' => 'admin.experiencia.list', 'uses' => 'ExperienciaController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.experiencia.delete', 'uses' => 'ExperienciaController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.experiencia.update', 'uses' => 'ExperienciaController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.experiencia.purge', 'uses' => 'ExperienciaController@purge']);
    });
    
    //EXPERIENCIA END

     //FORMACAO START
     Route::prefix('formacao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.formacao.create', 'uses' => 'FormacaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.formacao.edit', 'uses' => 'FormacaoController@edit']);
        Route::post('/store', ['as' => 'admin.formacao.store', 'uses' => 'FormacaoController@store']);
        Route::get('/list', ['as' => 'admin.formacao.list', 'uses' => 'FormacaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.formacao.delete', 'uses' => 'FormacaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.formacao.update', 'uses' => 'FormacaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.formacao.purge', 'uses' => 'FormacaoController@purge']);
    });
    
    //FORMACAO END

     //DMISSAO START
     Route::prefix('admissao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.admissao.create', 'uses' => 'AdmissaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.admissao.edit', 'uses' => 'AdmissaoController@edit']);
        Route::post('/store', ['as' => 'admin.admissao.store', 'uses' => 'AdmissaoController@store']);
        Route::get('/list', ['as' => 'admin.admissao.list', 'uses' => 'AdmissaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.admissao.delete', 'uses' => 'AdmissaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.admissao.update', 'uses' => 'AdmissaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.admissao.purge', 'uses' => 'AdmissaoController@purge']);
    });
    
    //ADMISSAO END

});