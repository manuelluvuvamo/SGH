<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\formacao;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class FormacaoController extends Controller
{
    //
    
    public function list(){

        $data['formacaos'] = Formacao::join('funcionarios', 'formacaos.idFuncionario', 'funcionarios.id')

        ->select(
            'formacaos.*',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->orderBy('funcionarios.nome')
        ->get();
        $data['page'] = "lista";
        return view('admin.formacao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.formacao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['formacao'] = Formacao::join('funcionarios', 'formacaos.idFuncionario', 'funcionarios.id')

        ->select(
            'formacaos.*',
            'funcionarios.nome as nome_funcionario',
           
        )
        ->where('formacaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['formacao']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.formacao.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
         
      
            $formacao = Formacao::create([
               
                'idFuncionario' => $request->idFuncionario,
                'instituicao' => $request->instituicao,
                'curso' => $request->curso,
                'nivel' => $request->nivel,
                'dataInicio' => $request->dataInicio,
                'dataFim' => $request->dataFim,
                
            ]);

            if ($formacao) {
              
                return redirect()->back()->with('formacao.create.success',1);
            }else{
                return redirect()->back()->with('formacao.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('formacao.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $formacao = Formacao::findOrFail($id);
                    
 
                     
                     $exp = Formacao::findOrFail($id)->update([
                                               
                        'idFuncionario' => $request->idFuncionario,
                        'instituicao' => $request->instituicao,
                        'curso' => $request->curso,
                        'nivel' => $request->nivel,
                        'dataInicio' => $request->dataInicio,
                        'dataFim' => $request->dataFim,
                        
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('formacao.update.success',1);
                        }else{
                            return redirect()->back()->with('formacao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('formacao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $formacao = Formacao::findOrFail($id);
            Formacao::findOrFail($id)->delete();
        return redirect()->back()->with('formacao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('formacao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $formacao = Formacao::findOrFail($id);
            Formacao::findOrFail($id)->forceDelete();
            if (is_dir($formacao->path)) {
                # code...
                unlink($formacao->path);
            }
        return redirect()->back()->with('formacao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('formacao.purge.error',1);
        }
    }
}
