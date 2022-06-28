<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcao;
use App\Models\Departamento;

class FuncaoController extends Controller
{
    //
    public function list(){

        $data['funcaos'] = Funcao::join('departamentos', 'funcaos.id_departamento', 'departamentos.id')

        ->select(
            'funcaos.*',
            'departamentos.nome  as nome_departamento',
           
        )
        ->get();
        $data['page'] = "lista";
        return view('admin.funcao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['departamentos'] = Departamento::all();
       
        return view('admin.funcao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['funcao'] = Funcao::join('departamentos', 'funcaos.id_departamento', 'departamentos.id')

        ->select(
            'funcaos.*',
            'departamentos.nome as nome_departamento',
           
        )
        ->where('funcaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['funcao']->id;


        $data['departamentos'] = Departamento::all();
       
        return view('admin.funcao.index',$data);
    }
      
   
    public function store(Request $request){


    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:32'], 
            'id_departamento' => ['required'],       
           
        ]);
         
      
            $funcao = Funcao::create([
                'nome' => $request->nome,
                'id_departamento' => $request->id_departamento,
                
            ]);

            if ($funcao) {
              
                return redirect()->back()->with('funcao.create.success',1);
            }else{
                return redirect()->back()->with('funcao.create.error',1);
            }
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('funcao.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
            $validator=$request->validate([
                'nome' => ['required', 'string', 'max:32'],
                'id_departamento' => ['required'],
               
               
            ]);

                    # code...
                    $funcao = Funcao::findOrFail($id);
                    
 
                     
                     $func = Funcao::findOrFail($id)->update([
                        'nome' => $request->nome,
                        'id_departamento' => $request->id_departamento,
                        'qnt' => $request->qnt,                        
                        
                    ]);
    
                         if ($func) {
                        # code...
                        
                           
                            return redirect()->back()->with('funcao.update.success',1);
                        }else{
                            return redirect()->back()->with('funcao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('funcao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $funcao = Funcao::findOrFail($id);
            Funcao::findOrFail($id)->delete();
        return redirect()->back()->with('funcao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('funcao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $funcao = Funcao::findOrFail($id);
            Funcao::findOrFail($id)->forceDelete();
            if (is_dir($funcao->path)) {
                # code...
                unlink($funcao->path);
            }
        return redirect()->back()->with('funcao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('funcao.purge.error',1);
        }
    }


}
