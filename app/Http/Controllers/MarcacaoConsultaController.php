<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\MarcacaoConsulta;


class MarcacaoConsultaController extends Controller
{
    //
    public function list(){

        $data['marcacao_consultas'] = MarcacaoConsulta::join('especialidades', 'marcacao_consultas.idEspecialidade', 'especialidades.id')
        ->join('pacientes', 'marcacao_consultas.idPaciente', 'pacientes.id')
        ->select(
            'marcacao_consultas.*','pacientes.nome as nome_paciente','especialidades.nome as nome_especialidade'
           
           
        )
        ->get();

       // dd( $data['marcacao_consultas']);
        $data['page'] = "lista";
        return view('admin.marcacao_consulta.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['especialidades'] = Especialidade::all();
        $data['pacientes'] = Paciente::all();
       
        return view('admin.marcacao_consulta.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['marcacao_consulta'] = MarcacaoConsulta::join('especialidades', 'marcacao_consultas.idEspecialidade', 'especialidades.id')
        ->join('pacientes', 'marcacao_consultas.idPaciente', 'pacientes.id')
        ->select(
            'marcacao_consultas.*',
            'especialidades.nome  as nome_especialidade',
            'pacientes.nome  as nome_paciente',
           
        )
        ->where('marcacao_consultas.id',$id)
        ->get()->first();
        $data['id'] =  $data['marcacao_consulta']->id;


        $data['especialidades'] = Especialidade::all();
       
        return view('admin.marcacao_consulta.index',$data);
    }
      
   
    public function store(Request $request){


      try {
        /* $validator=$request->validate([
            'numOrdem' => ['required', 'string'], 
            'paisOrdem' => ['required', 'string'], 
            'idEspecialidade' => ['required'],       
            'idPaciente' => ['required'],       
           
        ]); */
         
      /*   $DateTime = \DateTime::createFromFormat('d/m/Y', $request->data);
        $newDate = $DateTime->format('Y-m-d'); */

        //dd(  $newDate );
            $marcacao_consulta = MarcacaoConsulta::create([
                'data' =>  $request->data,
                'descricao' => $request->descricao,
                'hora' => $request->hora,
                'idEspecialidade' => $request->idEspecialidade,
                'idPaciente' => $request->idPaciente,
                
            ]);

            if ($marcacao_consulta) {
              
                return redirect()->back()->with('marcacao_consulta.create.success',1);
            }else{
                return redirect()->back()->with('marcacao_consulta.create.error',1);
            }
        
        
      } catch (\Throwable $th) {
          //throw $th;
             return redirect()->back()->with('marcacao_consulta.create.error',1);
      }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
            /* $validator=$request->validate([
                'numOrdem' => ['required', 'string'],
                'paisOrdem' => ['required', 'string'],
                'idEspecialidade' => ['required'],
                'idPaciente' => ['required'],
               
               
            ]); */

                    # code...
                    $marcacao_consulta = MarcacaoConsulta::findOrFail($id);
                    
                    /* $DateTime = \DateTime::createFromFormat('d/m/Y', $request->data);
                    $newDate = $DateTime->format('Y-m-d'); */
                    
                     
                     $func = MarcacaoConsulta::findOrFail($id)->update([
                        'data' =>  $request->data,
                        'descricao' => $request->descricao,
                        'hora' => $request->hora,
                        'idEspecialidade' => $request->idEspecialidade,
                        'idPaciente' => $request->idPaciente,
                                           
                        
                    ]);
    
                         if ($func) {
                        # code...
                        
                           
                            return redirect()->back()->with('marcacao_consulta.update.success',1);
                        }else{
                            return redirect()->back()->with('marcacao_consulta.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('marcacao_consulta.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $marcacao_consulta = MarcacaoConsulta::findOrFail($id);
            MarcacaoConsulta::findOrFail($id)->delete();
        return redirect()->back()->with('marcacao_consulta.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('marcacao_consulta.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $marcacao_consulta = MarcacaoConsulta::findOrFail($id);
            MarcacaoConsulta::findOrFail($id)->forceDelete();
          
        return redirect()->back()->with('marcacao_consulta.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('marcacao_consulta.purge.error',1);
        }
    }

    public function getDatasMarcadas(){

        $datas = MarcacaoConsulta::select("marcacao_consultas.data")->get();
        
        $dados["datas"] = array();

        foreach ( $datas  as  $data) {
            # code...
            array_push( $dados["datas"],date("d-m-Y",strtotime($data->data)));
        }
        //dd($dados["datas"] );
        return response()->json($dados["datas"]);
    }
}
