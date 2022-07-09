<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;

class EspecialidadeController extends Controller
{
    //
    public function list(){

        $data['especialidades'] = Especialidade::All();

      
        $data['page'] = "lista";
        return view('admin.especialidade.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.especialidade.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['especialidade'] = Especialidade::find($id);
        $data['id'] =  $data['especialidade']->id;
        //dd( $data['especialidade']);
        return view('admin.especialidade.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:especialidades'],

        ]);
         
            $especialidade = Especialidade::create([
                'nome' => $request->nome,
                
            ]);
    
            return redirect()->back()->with('especialidade.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('especialidade.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $especialidade = Especialidade::findOrFail($id);
                  
                        $dep = Especialidade::findOrFail($id)->update([
                            'nome' => $request->nome,
                            
                        ]);
                   
                    return redirect()->back()->with('especialidade.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('especialidade.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $especialidade = Especialidade::findOrFail($id);
            Especialidade::findOrFail($id)->delete();
        return redirect()->back()->with('especialidade.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('especialidade.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $especialidade = Especialidade::findOrFail($id);
            Especialidade::findOrFail($id)->forceDelete();
        return redirect()->back()->with('especialidade.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('especialidade.purge.error',1);
        }
    }
}
