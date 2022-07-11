<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Codigo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\NivelAvaliacao;
use App\Models\CriterioAvaliacao;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AvaliacaoController extends Controller
{
    //
    public function list(){

        $data['avaliacaos'] = DB::table('codigos')
        ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
        ->join('funcionarios', 'codigos.idFuncionario', 'funcionarios.id')
        ->join('users', 'avaliacaos.idUser', 'users.id')
        ->select(
            'codigos.*',
            'funcionarios.nome',
            'users.name',
            'avaliacaos.idUser'
        )
        ->distinct()
        ->get();
        $data['page'] = "lista";
        return view('admin.avaliacao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
      
        $data['criterios'] = CriterioAvaliacao::get();
        $data['nivels'] = NivelAvaliacao::get();
        $data['funcionarios'] = Funcionario::get();
       
        return view('admin.avaliacao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['avaliacao'] = Avaliacao::join('departamentos', 'avaliacaos.id_departamento', 'departamentos.id')

        ->select(
            'avaliacaos.*',
            'departamentos.nome as nome_departamento',
           
        )
        ->where('avaliacaos.id',$id)
        ->get()->first();
        $data['id'] =  $data['avaliacao']->id;


        $data['departamentos'] = Departamento::all();
       
        return view('admin.avaliacao.index',$data);
    }
      
   
    public function store(Request $request){


    //   try {
        
        $user = Auth::user();
        if (isset($request->avaliacao)) {
            $codigo = Codigo::create([
                'idFuncionario' => $request->idFuncionario,
            ]);
        }
        
        foreach ($request->avaliacao as $item) {
            // dd($item);
            Avaliacao::create([
                'descricao' => $item['descricao'],
                'idCriterio' => $item['idCriterio'],
                'idNivel' => $item['idNivel'],
                'idFuncionario' => $request->idFuncionario,
                'idUser' => $user->id,
                'idCodigo' => $codigo->id
            ]);
        }
           
              
        return redirect()->back()->with('avaliacao.create.success',1);
          
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('avaliacao.create.error',1);
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
                    $avaliacao = Avaliacao::findOrFail($id);
                    
 
                     
                     $func = Avaliacao::findOrFail($id)->update([
                        'nome' => $request->nome,
                        'id_departamento' => $request->id_departamento,
                        'qnt' => $request->qnt,                        
                        
                    ]);
    
                         if ($func) {
                        # code...
                        
                           
                            return redirect()->back()->with('avaliacao.update.success',1);
                        }else{
                            return redirect()->back()->with('avaliacao.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('avaliacao.update.error',1);
        }
    }

    public function show($id){
        $data['avaliacao'] = DB::table('codigos')
        ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
        ->join('funcionarios', 'codigos.idFuncionario', 'funcionarios.id')
        ->join('users', 'avaliacaos.idUser', 'users.id')
        ->select(
            'codigos.*',
            'funcionarios.nome',
            'users.name',
            'avaliacaos.idUser'
        )
        ->distinct()
        ->get()->first();

        return view("admin.avaliacao.visualizar.index",$data);
    }

    public function delete($id){
        try {
            
            $avaliacao = Avaliacao::findOrFail($id);
            Avaliacao::findOrFail($id)->delete();
        return redirect()->back()->with('avaliacao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('avaliacao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $avaliacao = Avaliacao::findOrFail($id);
            Avaliacao::findOrFail($id)->forceDelete();
            if (is_dir($avaliacao->path)) {
                # code...
                unlink($avaliacao->path);
            }
        return redirect()->back()->with('avaliacao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('avaliacao.purge.error',1);
        }
    }
}
