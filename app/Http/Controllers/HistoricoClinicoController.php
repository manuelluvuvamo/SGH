<?php

namespace App\Http\Controllers;

use App\Models\historico_clinico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;
use App\Models\HistoricoClinico;
use App\Models\Paciente;
use App\Models\Patologia;

class HistoricoClinicoController extends Controller
{
    //
    public function list($id){

        $data['historico_clinicos'] = HistoricoClinico::join('pacientes', 'historico_clinicos.idPaciente', 'pacientes.id')
        ->join('patologias', 'historico_clinicos.idPatologia', 'patologias.id')
        ->select(
            'historico_clinicos.*',
            'pacientes.nome  as nome_paciente',
            'patologias.nome  as nome_patologia',
           
        )
        ->where('historico_clinicos.idPaciente',$id)
        ->get();

      
        $data['page'] = "lista";
        $data['id'] = $id;
        return view('admin.historico_clinico.index',$data);
    }


    public function create($id){
        
        $data['page'] = "criar";
        $data['paci'] = 1;
        $data['pacientes'] = Paciente::where("id",$id)->get();
        $data['patologias'] = Patologia::all();
        
        return view('admin.historico_clinico.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['historico_clinico'] = HistoricoClinico::join('pacientes', 'historico_clinicos.idPaciente', 'pacientes.id')
        ->join('patologias', 'historico_clinicos.idPatologia', 'patologias.id')
        ->select(
            'historico_clinicos.*',
            'pacientes.nome  as nome_paciente',
            'patologias.nome  as nome_patologia',
           
        )
        ->where('historico_clinicos.id',$id)
        ->get()->first();

        $data['id'] =  $data['historico_clinico']->id;
        $data['paci'] = 1;
        $data['pacientes'] = Paciente::where("id",$id)->get();
        $data['patologias'] = Patologia::all();
        //dd( $data['historico_clinico']);
        return view('admin.historico_clinico.index',$data);
    }

    public function store(Request $request){

        
      try {
       
         
            $historico_clinico = HistoricoClinico::create([
               
                'idPaciente'=>$request->idPaciente,
                'idPatologia'=>$request->idPatologia,
                'descricao'=>$request->descricao,
                'resultado'=>$request->resultado,
                
            ]);
    
            return redirect()->back()->with('historico_clinico.create.success',1);
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('historico_clinico.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
        try {
              

               
                   
                    $historico_clinico = HistoricoClinico::findOrFail($id);
                  
                        $dep = HistoricoClinico::findOrFail($id)->update([
                            'idPaciente'=>$request->idPaciente,
                            'idPatologia'=>$request->idPatologia,
                            'descricao'=>$request->descricao,
                            'resultado'=>$request->resultado,
                            
                        ]);
                   
                    return redirect()->back()->with('historico_clinico.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('historico_clinico.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $historico_clinico = HistoricoClinico::findOrFail($id);
            HistoricoClinico::findOrFail($id)->delete();
        return redirect()->back()->with('historico_clinico.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('historico_clinico.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $historico_clinico = HistoricoClinico::findOrFail($id);
            HistoricoClinico::findOrFail($id)->forceDelete();
        return redirect()->back()->with('historico_clinico.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('historico_clinico.purge.error',1);
        }
    }
}
