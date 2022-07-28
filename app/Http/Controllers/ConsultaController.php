<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\MarcacaoConsulta;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;


class ConsultaController extends Controller
{
    //
     //
     public function list(){

        $data['consultas'] = Consulta::join('funcionarios', 'consultas.idfuncionario', 'funcionarios.id')
        ->join('pacientes', 'consultas.idPaciente', 'pacientes.id')
        ->join('marcacao_consultas', 'consultas.idMarcacao', 'marcacao_consultas.id')
        ->join('especialidades', 'marcacao_consultas.idEspecialidade', 'especialidades.id')
        ->select(
            'consultas.*','pacientes.nome as nome_paciente','funcionarios.nome as nome_funcionario', 'marcacao_consultas.data',
            'marcacao_consultas.hora',
            'especialidades.nome as nome_especialidade'
           
           
        )
        ->get();

       // dd( $data['consultas']);
        $data['page'] = "lista";
        return view('admin.consulta.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['marcacaos']=MarcacaoConsulta::all();
        $data['funcionarios'] = Funcionario::all();
        $data['pacientes'] = Paciente::all();
       
        return view('admin.consulta.index',$data);
    }

    public function createDirect($id){

        $data['page'] = "criar";
        $data['marcacaos']=MarcacaoConsulta::where("id",$id)->get();
        $data['marcacao']=MarcacaoConsulta::find($id);
        $data['marc'] = 1;
       
    
        if (Auth::user()->tipo_conta=="Administrador") {
            # code...
            $data['funcionarios'] = Funcionario::all();
        }else {
            
            $data['funcionarios'] = Funcionario::where("idUser",Auth::user()->id)->get();
            $data['func'] = 1;
        }
        $data['pacientes'] = Paciente::where("id",$data['marcacao']->idPaciente)->get();
        $data['pac'] = 1;
        

        return view('admin.consulta.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['consulta'] = Consulta::join('funcionarios', 'consultas.idfuncionario', 'funcionarios.id')
        ->join('pacientes', 'consultas.idPaciente', 'pacientes.id')
        ->join('marcacao_consultas', 'consultas.idMarcacao', 'marcacao_consultas.id')
        ->join('especialidades', 'marcacao_consultas.idEspecialidade', 'especialidades.id')
        ->select(
            'consultas.*',
            'funcionarios.nome  as nome_funcionario',
            'pacientes.nome  as nome_paciente',
            'marcacao_consultas.data',
            'marcacao_consultas.hora',
            'especialidades.nome as nome_especialidade'
           
        )
        ->where('consultas.id',$id)
        ->get()->first();
        $data['marcacaos']=MarcacaoConsulta::all();
        $data['funcionarios'] = Funcionario::all();
        $data['pacientes'] = Paciente::all();
       
        $data['id'] =  $data['consulta']->id;


        $data['funcionarios'] = Funcionario::all();
       
        return view('admin.consulta.index',$data);
    }
      
   
    public function store(Request $request){


      try {
        

        
      
       
            $consulta = Consulta::create([
                'diagnostico'=>  $request->diagnostico,
                'descricao'=> $request->descricao,
                'idMarcacao'=> $request->idMarcacao,
                'idFuncionario'=> $request->idFuncionario,
                'idPaciente'=> $request->idPaciente,
                
            ]);

            if ($consulta) {
              
                return redirect()->back()->with('consulta.create.success',1);
            }else{
                return redirect()->back()->with('consulta.create.error',1);
            }
        
        
      } catch (\Throwable $th) {
          //throw $th;
             return redirect()->back()->with('consulta.create.error',1);
      }
    }
    public function update(Request $request,$id ){
            
         try {
           

                    # code...
                    $consulta = Consulta::findOrFail($id);
                    
                   
                    
                     
                     $cons = Consulta::findOrFail($id)->update([
                        'diagnostico'=>  $request->diagnostico,
                        'descricao'=> $request->descricao,
                        'idMarcacao'=> $request->idMarcacao,
                        'idFuncionario'=> $request->idFuncionario,
                        'idPaciente'=> $request->idPaciente,
                                           
                        
                    ]);
    
                         if ($cons) {
                        # code...
                        
                           
                            return redirect()->back()->with('consulta.update.success',1);
                        }else{
                            return redirect()->back()->with('consulta.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('consulta.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $consulta = Consulta::findOrFail($id);
            Consulta::findOrFail($id)->delete();
        return redirect()->back()->with('consulta.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('consulta.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $consulta = Consulta::findOrFail($id);
            Consulta::findOrFail($id)->forceDelete();
          
        return redirect()->back()->with('consulta.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('consulta.purge.error',1);
        }
    }

   
}
