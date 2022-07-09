<?php

namespace App\Http\Controllers;


use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;
use App\Models\Medico;

class MedicoController extends Controller
{
    //
    public function list(){

        $data['medicos'] = Medico::join('especialidades', 'medicos.idEspecialidade', 'especialidades.id')
        ->join('funcionarios', 'medicos.idFuncionario', 'funcionarios.id')
        ->select(
            'medicos.*',
           
           
        )
        ->get();

       // dd( $data['medicos']);
        $data['page'] = "lista";
        return view('admin.medico.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['especialidades'] = Especialidade::all();
        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.medico.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['medico'] = Medico::join('especialidades', 'medicos.idEspecialidade', 'especialidades.id')
        ->join('funcionarios', 'medicos.idFuncionario', 'funcionarios.id')
        ->select(
            'medicos.*',
            'especialidades.nome  as nome_especialidade',
            'funcionarios.nome  as nome_funcionario',
           
        )
        ->where('medicos.id',$id)
        ->get()->first();
        $data['id'] =  $data['medico']->id;


        $data['especialidades'] = Especialidade::all();
       
        return view('admin.medico.index',$data);
    }
      
   
    public function store(Request $request){


    //  try {
        $validator=$request->validate([
            'numOrdem' => ['required', 'string'], 
            'paisOrdem' => ['required', 'string'], 
            'idEspecialidade' => ['required'],       
            'idFuncionario' => ['required'],       
           
        ]);
         
      
            $medico = Medico::create([
                'numOrdem' => $request->numOrdem,
                'paisOrdem' => $request->paisOrdem,
                'idEspecialidade' => $request->idEspecialidade,
                'idFuncionario' => $request->idFuncionario,
                
            ]);

            if ($medico) {
              
                return redirect()->back()->with('medico.create.success',1);
            }else{
                return redirect()->back()->with('medico.create.error',1);
            }
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('medico.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
            $validator=$request->validate([
                'numOrdem' => ['required', 'string'],
                'paisOrdem' => ['required', 'string'],
                'idEspecialidade' => ['required'],
                'idFuncionario' => ['required'],
               
               
            ]);

                    # code...
                    $medico = Medico::findOrFail($id);
                    
 
                     
                     $func = Medico::findOrFail($id)->update([
                        'numOrdem' => $request->numOrdem,
                        'paisOrdem' => $request->paisOrdem,
                        'idEspecialidade' => $request->idEspecialidade,
                        'idFuncionario' => $request->idFuncionario,
                                           
                        
                    ]);
    
                         if ($func) {
                        # code...
                        
                           
                            return redirect()->back()->with('medico.update.success',1);
                        }else{
                            return redirect()->back()->with('medico.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('medico.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $medico = Medico::findOrFail($id);
            Medico::findOrFail($id)->delete();
        return redirect()->back()->with('medico.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('medico.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $medico = Medico::findOrFail($id);
            Medico::findOrFail($id)->forceDelete();
          
        return redirect()->back()->with('medico.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('medico.purge.error',1);
        }
    }
}
