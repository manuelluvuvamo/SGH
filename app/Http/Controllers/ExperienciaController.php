<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Experiencia;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class ExperienciaController extends Controller
{
    //

    public function list(){

        $data['experiencias'] = Experiencia::join('funcionarios', 'experiencias.idFuncionario', 'funcionarios.id')

        ->select(
            'experiencias.*',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->orderBy('funcionarios.nome')
        ->get();
        $data['page'] = "lista";
        return view('admin.experiencia.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.experiencia.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['experiencia'] = Experiencia::join('funcionarios', 'experiencias.idFuncionario', 'funcionarios.id')

        ->select(
            'experiencias.*',
            'funcionarios.nome as nome_funcionario',
           
        )
        ->where('experiencias.id',$id)
        ->get()->first();
        $data['id'] =  $data['experiencia']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.experiencia.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
         
      
            $experiencia = Experiencia::create([
               
                'idFuncionario' => $request->idFuncionario,
                'instituicao' => $request->instituicao,
                'cargo' => $request->cargo,
                'funcao' => $request->funcao,
                'dataInicio' => $request->dataInicio,
                'dataFim' => $request->dataFim,
                
            ]);

            if ($experiencia) {
              
                return redirect()->back()->with('experiencia.create.success',1);
            }else{
                return redirect()->back()->with('experiencia.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('experiencia.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $experiencia = Experiencia::findOrFail($id);
                    
 
                     
                     $exp = Experiencia::findOrFail($id)->update([
                        'idFuncionario' => $request->idFuncionario,
                        'instituicao' => $request->instituicao,
                        'cargo' => $request->cargo,
                        'funcao' => $request->funcao,
                        'dataInicio' => $request->dataInicio,
                        'dataFim' => $request->dataFim,   
                        
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('experiencia.update.success',1);
                        }else{
                            return redirect()->back()->with('experiencia.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('experiencia.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $experiencia = Experiencia::findOrFail($id);
            Experiencia::findOrFail($id)->delete();
        return redirect()->back()->with('experiencia.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('experiencia.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $experiencia = Experiencia::findOrFail($id);
            Experiencia::findOrFail($id)->forceDelete();
            if (is_dir($experiencia->path)) {
                # code...
                unlink($experiencia->path);
            }
        return redirect()->back()->with('experiencia.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('experiencia.purge.error',1);
        }
    }
}
