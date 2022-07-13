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

        $dados["total_departamento"] = \App\Models\Departamento::count();
        $dados["total_funcao"] = \App\Models\Funcao::count();
        $dados["total_funcionario"] = \App\Models\Funcionario::count();
        $dados["total_user"] = \App\Models\User::count();
        
    
        return view('dash',$dados);
    })->name('dash');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        $dados["total_departamento"] = \App\Models\Departamento::count();
        $dados["total_funcao"] = \App\Models\Funcao::count();
        $dados["total_funcionario"] = \App\Models\Funcionario::count();
        $dados["total_user"] = \App\Models\User::count();
        
    
        return view('dash',$dados);
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
        Route::get('/add/{id}/demissao', ['as' => 'admin.funcionario.addDemissao', 'uses' => 'FuncionarioController@addDemissao']);
        Route::get('/add/{id}/remuneracao', ['as' => 'admin.funcionario.addRemuneracao', 'uses' => 'FuncionarioController@addRemuneracao']);
        Route::get('/add/{id}/medico', ['as' => 'admin.funcionario.addMedico', 'uses' => 'FuncionarioController@addMedico']);


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


     //DEMISSAO START
     Route::prefix('demissao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.demissao.create', 'uses' => 'DemissaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.demissao.edit', 'uses' => 'DemissaoController@edit']);
        Route::post('/store', ['as' => 'admin.demissao.store', 'uses' => 'DemissaoController@store']);
        Route::get('/list', ['as' => 'admin.demissao.list', 'uses' => 'DemissaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.demissao.delete', 'uses' => 'DemissaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.demissao.update', 'uses' => 'DemissaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.demissao.purge', 'uses' => 'DemissaoController@purge']);
    });
    
    //DEMISSAO END


     //REMUNERACAO START
     Route::prefix('remuneracao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.remuneracao.create', 'uses' => 'RemuneracaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.remuneracao.edit', 'uses' => 'RemuneracaoController@edit']);
        Route::post('/store', ['as' => 'admin.remuneracao.store', 'uses' => 'RemuneracaoController@store']);
        Route::get('/list', ['as' => 'admin.remuneracao.list', 'uses' => 'RemuneracaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.remuneracao.delete', 'uses' => 'RemuneracaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.remuneracao.update', 'uses' => 'RemuneracaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.remuneracao.purge', 'uses' => 'RemuneracaoController@purge']);
    });
    
    //REMUNERACAO END

     //ESPECIALIDADE START
     Route::prefix('especialidade')->group(function () {

   
        Route::get('/create', ['as' => 'admin.especialidade.create', 'uses' => 'EspecialidadeController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.especialidade.edit', 'uses' => 'EspecialidadeController@edit']);
        Route::post('/store', ['as' => 'admin.especialidade.store', 'uses' => 'EspecialidadeController@store']);
        Route::get('/list', ['as' => 'admin.especialidade.list', 'uses' => 'EspecialidadeController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.especialidade.delete', 'uses' => 'EspecialidadeController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.especialidade.update', 'uses' => 'EspecialidadeController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.especialidade.purge', 'uses' => 'EspecialidadeController@purge']);
    });
    
    //ESPECIALIDADE END

    //MÉDICO START
    Route::prefix('medico')->group(function () {

   
        Route::get('/create', ['as' => 'admin.medico.create', 'uses' => 'MedicoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.medico.edit', 'uses' => 'MedicoController@edit']);
        Route::post('/store', ['as' => 'admin.medico.store', 'uses' => 'MedicoController@store']);
        Route::get('/list', ['as' => 'admin.medico.list', 'uses' => 'MedicoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.medico.delete', 'uses' => 'MedicoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.medico.update', 'uses' => 'MedicoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.medico.purge', 'uses' => 'MedicoController@purge']);
    });
    
    //MÉDICO END

    //CRITÉRIO START
    Route::prefix('criterio-avaliacao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.criterio-avaliacao.create', 'uses' => 'CriterioAvaliacaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.criterio-avaliacao.edit', 'uses' => 'CriterioAvaliacaoController@edit']);
        Route::post('/store', ['as' => 'admin.criterio-avaliacao.store', 'uses' => 'CriterioAvaliacaoController@store']);
        Route::get('/list', ['as' => 'admin.criterio-avaliacao.list', 'uses' => 'CriterioAvaliacaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.criterio-avaliacao.delete', 'uses' => 'CriterioAvaliacaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.criterio-avaliacao.update', 'uses' => 'CriterioAvaliacaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.criterio-avaliacao.purge', 'uses' => 'CriterioAvaliacaoController@purge']);
    });
    
    //CRITÉRIO END

    //NÍVEL START
    Route::prefix('nivel-avaliacao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.nivel-avaliacao.create', 'uses' => 'NivelAvaliacaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.nivel-avaliacao.edit', 'uses' => 'NivelAvaliacaoController@edit']);
        Route::post('/store', ['as' => 'admin.nivel-avaliacao.store', 'uses' => 'NivelAvaliacaoController@store']);
        Route::get('/list', ['as' => 'admin.nivel-avaliacao.list', 'uses' => 'NivelAvaliacaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.nivel-avaliacao.delete', 'uses' => 'NivelAvaliacaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.nivel-avaliacao.update', 'uses' => 'NivelAvaliacaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.nivel-avaliacao.purge', 'uses' => 'NivelAvaliacaoController@purge']);
    });
    
    //NÍVEL END

    //AVALIAÇÃO START
    Route::prefix('avaliacao')->group(function () {

   
        Route::get('/create', ['as' => 'admin.avaliacao.create', 'uses' => 'AvaliacaoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.avaliacao.edit', 'uses' => 'AvaliacaoController@edit']);
        Route::post('/store', ['as' => 'admin.avaliacao.store', 'uses' => 'AvaliacaoController@store']);
        Route::get('/list', ['as' => 'admin.avaliacao.list', 'uses' => 'AvaliacaoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.avaliacao.delete', 'uses' => 'AvaliacaoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.avaliacao.update', 'uses' => 'AvaliacaoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.avaliacao.purge', 'uses' => 'AvaliacaoController@purge']);
        Route::get('/visualizar/{id}', ['as' => 'admin.avaliacao.visualizar', 'uses' => 'AvaliacaoController@show']);
    });
    
    //AVALIAÇÃO END

     //ACESSO START
     Route::prefix('acesso')->group(function () {

   
        Route::get('/create/{tipo}', ['as' => 'admin.acesso.create', 'uses' => 'AcessoController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.acesso.edit', 'uses' => 'AcessoController@edit']);
        Route::post('/store', ['as' => 'admin.acesso.store', 'uses' => 'AcessoController@store']);
        Route::get('/list', ['as' => 'admin.acesso.list', 'uses' => 'AcessoController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.acesso.delete', 'uses' => 'AcessoController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.acesso.update', 'uses' => 'AcessoController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.acesso.purge', 'uses' => 'AcessoController@purge']);
        Route::get('/visualizar/{id}', ['as' => 'admin.acesso.visualizar', 'uses' => 'AcessoController@show']);
    });
    
    //ACESSO END

    //PATOLOGIA START
    Route::prefix('patologia')->group(function () {

   
        Route::get('/create', ['as' => 'admin.patologia.create', 'uses' => 'PatologiaController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.patologia.edit', 'uses' => 'PatologiaController@edit']);
        Route::post('/store', ['as' => 'admin.patologia.store', 'uses' => 'PatologiaController@store']);
        Route::get('/list', ['as' => 'admin.patologia.list', 'uses' => 'PatologiaController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.patologia.delete', 'uses' => 'PatologiaController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.patologia.update', 'uses' => 'PatologiaController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.patologia.purge', 'uses' => 'PatologiaController@purge']);
        Route::get('/visualizar/{id}', ['as' => 'admin.patologia.visualizar', 'uses' => 'PatologiaController@show']);
    });
    
    //PATOLOGIA END

     //PACIENTE START
     Route::prefix('paciente')->group(function () {

   
        Route::get('/create', ['as' => 'admin.paciente.create', 'uses' => 'PacienteController@create']);
        Route::get('/edit/{id}', ['as' => 'admin.paciente.edit', 'uses' => 'PacienteController@edit']);
        Route::post('/store', ['as' => 'admin.paciente.store', 'uses' => 'PacienteController@store']);
        Route::get('/list', ['as' => 'admin.paciente.list', 'uses' => 'PacienteController@list']);
        Route::get('/delete/{id}', ['as' => 'admin.paciente.delete', 'uses' => 'PacienteController@delete']);
        Route::put('/update/{id}', ['as' => 'admin.paciente.update', 'uses' => 'PacienteController@update']);
        Route::get('/purge/{id}', ['as' => 'admin.paciente.purge', 'uses' => 'PacienteController@purge']);
        Route::get('/visualizar/{id}', ['as' => 'admin.paciente.visualizar', 'uses' => 'PacienteController@show']);
    });
    
    //PACIENTE END

});