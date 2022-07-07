<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Demissao;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class DemissaoController extends Controller
{
    //
    public function list(){

        $data['demissaos'] = Demissao::join('funcionarios', 'demissaos.idFuncionario', 'funcionarios.id')

        ->select(
            'demissaos.*',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->orderBy('funcionarios.nome')
        ->get();
        $data['page'] = "lista";
        return view('admin.demissao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.demissao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['demissao'] = Demissao::join('funcionarios', 'demissaos.idFuncionario', 'funcionarios.id')

        ->select(
            'demissaos.*',
            'funcionarios.nome as nome_funcionario',
           
        )
        ->where('demissaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['demissao']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.demissao.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
         
      
            $demissao = Demissao::create([
               
                'idFuncionario' => $request->idFuncionario,
                'motivo' => $request->motivo,
                'descricao' => $request->descricao,
                
                
            ]);

            if ($demissao) {
              
                return redirect()->back()->with('demissao.create.success',1);
            }else{
                return redirect()->back()->with('demissao.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('demissao.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $demissao = Demissao::findOrFail($id);
                    
 
                     
                     $exp = Demissao::findOrFail($id)->update([
                                               
                        'idFuncionario' => $request->idFuncionario,
                        'motivo' => $request->motivo,
                        'descricao' => $request->descricao,
                        
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('demissao.update.success',1);
                        }else{
                            return redirect()->back()->with('demissao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('demissao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $demissao = Demissao::findOrFail($id);
            Demissao::findOrFail($id)->delete();
        return redirect()->back()->with('demissao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('demissao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $demissao = Demissao::findOrFail($id);
            Demissao::findOrFail($id)->forceDelete();
            if (is_dir($demissao->path)) {
                # code...
                unlink($demissao->path);
            }
        return redirect()->back()->with('demissao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('demissao.purge.error',1);
        }
    }
}
