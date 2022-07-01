<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Admissao;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
class AdmissaoController extends Controller
{
    //
    
    public function list(){

        $data['admissaos'] = Admissao::join('funcionarios', 'admissaos.idFuncionario', 'funcionarios.id')

        ->select(
            'admissaos.*',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->orderBy('funcionarios.nome')
        ->get();
        $data['page'] = "lista";
        return view('admin.admissao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.admissao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['admissao'] = Admissao::join('funcionarios', 'admissaos.idFuncionario', 'funcionarios.id')

        ->select(
            'admissaos.*',
            'funcionarios.nome as nome_funcionario',
           
        )
        ->where('admissaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['admissao']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.admissao.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
         
      
            $admissao = Admissao::create([
               
                'idFuncionario' => $request->idFuncionario,
                'dataAdmissao' => $request->dataAdmissao,
                'cargoInicial' => $request->cargoInicial,
                'salarioInicia' => $request->salarioInicia,
                'numDependentes' => $request->numDependentes,
                'numRegistro' => $request->numRegistro,
                
            ]);

            if ($admissao) {
              
                return redirect()->back()->with('admissao.create.success',1);
            }else{
                return redirect()->back()->with('admissao.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('admissao.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $admissao = Admissao::findOrFail($id);
                    
 
                     
                     $exp = Admissao::findOrFail($id)->update([
                                               
                        'idFuncionario' => $request->idFuncionario,
                        'dataAdmissao' => $request->dataAdmissao,
                        'cargoInicial' => $request->cargoInicial,
                        'salarioInicia' => $request->salarioInicia,
                        'numDependentes' => $request->numDependentes,
                        'numRegistro' => $request->numRegistro,
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('admissao.update.success',1);
                        }else{
                            return redirect()->back()->with('admissao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('admissao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $admissao = Admissao::findOrFail($id);
            Admissao::findOrFail($id)->delete();
        return redirect()->back()->with('admissao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('admissao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $admissao = Admissao::findOrFail($id);
            Admissao::findOrFail($id)->forceDelete();
            if (is_dir($admissao->path)) {
                # code...
                unlink($admissao->path);
            }
        return redirect()->back()->with('admissao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('admissao.purge.error',1);
        }
    }
}
