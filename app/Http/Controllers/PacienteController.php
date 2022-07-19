<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;


class PacienteController extends Controller
{
    //
    public function list(){

        $data['pacientes'] = Paciente::All();

      
        $data['page'] = "lista";
        return view('admin.paciente.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.paciente.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['paciente'] = Paciente::find($id);
        $data['id'] =  $data['paciente']->id;
        //dd( $data['paciente']);
        return view('admin.paciente.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:pacientes'],

        ]);
         
            $paciente = Paciente::create([
                'nome' => $request->nome,
                'dataNascimento'  => $request->dataNascimento,
                'estadoCivil'  => $request->estadoCivil,
                'peso'  => $request->peso,
                'pressaoArterial'  => $request->pressaoArterial,
                'numBI'  => $request->numBI,
                'telefone'  => $request->telefone,
                'endereco'  => $request->endereco,
                
            ]);
    
            return redirect()->back()->with('paciente.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('paciente.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $paciente = Paciente::findOrFail($id);
                  
                        $dep = Paciente::findOrFail($id)->update([
                            'nome' => $request->nome,
                            'dataNascimento'  => $request->dataNascimento,
                            'estadoCivil'  => $request->estadoCivil,
                            'peso'  => $request->peso,
                            'pressaoArterial'  => $request->pressaoArterial,
                            'numBI'  => $request->numBI,
        
                            'telefone'  => $request->telefone,
                            'endereco'  => $request->endereco,
                            
                        ]);
                   
                    return redirect()->back()->with('paciente.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('paciente.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $paciente = Paciente::findOrFail($id);
            Paciente::findOrFail($id)->delete();
        return redirect()->back()->with('paciente.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('paciente.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $paciente = Paciente::findOrFail($id);
            Paciente::findOrFail($id)->forceDelete();
        return redirect()->back()->with('paciente.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('paciente.purge.error',1);
        }
    }
    public function addHistoricoClinico($id){
        
        $data['page'] = "criar";
        $data['paci'] = 1;
        $data['pacientes'] = Paciente::where("id",$id)->get();
       
        return view('admin.historico_clinico.index',$data);
    }
}
