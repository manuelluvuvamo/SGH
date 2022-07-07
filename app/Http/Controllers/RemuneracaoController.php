<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Remuneracao;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class RemuneracaoController extends Controller
{
    //
    //
    public function list(){

        $data['remuneracaos'] = Remuneracao::join('funcionarios', 'remuneracaos.idFuncionario', 'funcionarios.id')

        ->select(
            'remuneracaos.*',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->orderBy('funcionarios.nome')
        ->get();
        $data['page'] = "lista";
        return view('admin.remuneracao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.remuneracao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['remuneracao'] = Remuneracao::join('funcionarios', 'remuneracaos.idFuncionario', 'funcionarios.id')

        ->select(
            'remuneracaos.*',
            'funcionarios.nome as nome_funcionario',
           
        )
        ->where('remuneracaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['remuneracao']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.remuneracao.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
         
      
            $remuneracao = Remuneracao::create([
               
                'idFuncionario' => $request->idFuncionario,
                'salario_base' => $request->salario_base,
                'salario_liquido' => $request->salario_liquido,
                'tipo' => $request->tipo,
                
                
                
            ]);

            if ($remuneracao) {
              
                return redirect()->back()->with('remuneracao.create.success',1);
            }else{
                return redirect()->back()->with('remuneracao.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('remuneracao.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $remuneracao = Remuneracao::findOrFail($id);
                    
 
                     
                     $exp = Remuneracao::findOrFail($id)->update([
                                               
                        'idFuncionario' => $request->idFuncionario,
                        'salario_base' => $request->salario_base,
                        'salario_liquido' => $request->salario_liquido,
                        'tipo' => $request->tipo,
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('remuneracao.update.success',1);
                        }else{
                            return redirect()->back()->with('remuneracao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('remuneracao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $remuneracao = Remuneracao::findOrFail($id);
            Remuneracao::findOrFail($id)->delete();
        return redirect()->back()->with('remuneracao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('remuneracao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $remuneracao = Remuneracao::findOrFail($id);
            Remuneracao::findOrFail($id)->forceDelete();
            if (is_dir($remuneracao->path)) {
                # code...
                unlink($remuneracao->path);
            }
        return redirect()->back()->with('remuneracao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('remuneracao.purge.error',1);
        }
    }
}
