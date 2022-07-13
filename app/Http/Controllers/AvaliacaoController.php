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
use Nette\Utils\Json;
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
        if ($data['codigo'] = Codigo::find($id)) {
            # code...
            $avaliacao = Avaliacao::where('idCodigo', $id)->get()->first();
            $data['avaliacao'] = DB::table('codigos')
                ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
                ->join('criterio_avaliacaos', 'avaliacaos.idCriterio', 'criterio_avaliacaos.id')
                ->join('nivel_avaliacaos', 'avaliacaos.idNivel', 'nivel_avaliacaos.id')
                ->join('funcionarios', 'avaliacaos.idFuncionario', 'funcionarios.id')
                ->select(
                    'codigos.*',
                    'avaliacaos.idCriterio',
                    'avaliacaos.idNivel',
                    'funcionarios.nome',
                    'criterio_avaliacaos.nome as criterio',
                    'nivel_avaliacaos.nome as nivel'
                )
                ->where([['codigos.id', $id]])
                ->get()->first();

                $data['avaliacaos'] = DB::table('codigos')
                ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
                ->join('criterio_avaliacaos', 'avaliacaos.idCriterio', 'criterio_avaliacaos.id')
                ->join('nivel_avaliacaos', 'avaliacaos.idNivel', 'nivel_avaliacaos.id')
                ->join('funcionarios', 'avaliacaos.idFuncionario', 'funcionarios.id')
                ->select(
                    'codigos.*',
                    'avaliacaos.idCriterio',
                    'avaliacaos.descricao',
                    'funcionarios.nome',
                    'criterio_avaliacaos.nome as criterio',
                    'nivel_avaliacaos.nome as nivel'
                )
                ->where([['codigos.id', $id]])
                ->get();

                $data['avaliacaos'] = Json::encode($data['avaliacaos']);

                $data['criterios'] = CriterioAvaliacao::get();
                $data['nivels'] = NivelAvaliacao::get();
                $dados['funcionarios'] = Funcionario::whereNotIn('id', [$avaliacao->idFuncionario])->get();
                $data['id'] =  $data['avaliacao']->id;
        }
      


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
           
             $avaliacaos = Avaliacao::where('idCodigo', $id)->get();
            $avaliacaos1 = Avaliacao::where('idCodigo', $id)->get()->first();
            if (isset($request->avaliacao)) {
                foreach ($avaliacaos as $avaliacao) {
                    $existe = 0;
                    foreach ($request->avaliacao as  $item) {
                        if ($item['idCriterio'] == $avaliacao->idCriterio) {
                            $existe = 1;
                        }
                    }
                    if (!($existe)) {
                        // dd($avaliacao);
                        //Avaliacao::find($avaliacao->id)->delete();
                        Avaliacao::findOrFail($avaliacao->id)->delete();
                    }
                }
            }
            foreach ($request->avaliacao as  $item) {
                if (Avaliacao::where('idCriterio', $item['idCriterio'])->count()) {
                    Avaliacao::where('id', $item['idCriterio'])->update([
                        'descricao' => $item['descricao'],
                        'idCriterio' => $item['idCriterio'],
                        'idNivel' => $item['idNivel'],
                        'idFuncionario' => $request->idFuncionario,
                    ]);
                } else {
                    Avaliacao::create([
                        'descricao' => $item['descricao'],
                        'idCriterio' => $item['idCriterio'],
                        'idNivel' => $item['idNivel'],
                        'idFuncionario' => $request->idFuncionario,
                        'idUser' => $avaliacaos1->idUser,
                        'idCodigo' => $id,
                        
                    ]);
                }
            }     
            
            
             return redirect()->back()->with('avaliacao.update.success',1);
                       
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('avaliacao.update.error',1);
        }
    }

    public function show($id){
        $data['codigo'] =  DB::table('codigos')
        ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
        ->join('funcionarios', 'codigos.idFuncionario', 'funcionarios.id')
        ->join('users', 'avaliacaos.idUser', 'users.id')
        ->select(
            'codigos.*',
            'funcionarios.nome',
            'users.name',
            'avaliacaos.idUser'
        )
        ->where("codigos.id",$id)->get()->first();

        $data['avaliacaos'] = DB::table('codigos')
        ->join('avaliacaos', 'codigos.id', 'avaliacaos.idCodigo')
        ->join('funcionarios', 'codigos.idFuncionario', 'funcionarios.id')
        ->join('users', 'avaliacaos.idUser', 'users.id')
        ->join('criterio_avaliacaos', 'avaliacaos.idCriterio', 'criterio_avaliacaos.id')
        ->join('nivel_avaliacaos', 'avaliacaos.idNivel', 'nivel_avaliacaos.id')

        ->select(
            // 'codigos.*',
            'funcionarios.nome',
            'users.name',
            'avaliacaos.*',
            'criterio_avaliacaos.nome as criterio',
            'nivel_avaliacaos.nome as nivel'
        )
        ->where("codigos.id",$id)
        ->get();

        //dd( $data['avaliacaos']);

        return view("admin.avaliacao.visualizar.index",$data);
    }

    public function delete($id){
        try {
            
            
            $codigo = Codigo::findOrFail($id);

            Codigo::findOrFail($id)->delete();
            Avaliacao::where("idCodigo",$id)->delete();
        return redirect()->back()->with('avaliacao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('avaliacao.delete.error',1);
        }
    }
    public function purge($id){
         try {
            
            $codigo = Codigo::findOrFail($id);
            Codigo::findOrFail($id)->forceDelete();
            Avaliacao::where("idCodigo",$id)->forceDelete();
           
        return redirect()->back()->with('avaliacao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('avaliacao.purge.error',1);
        }
    }
}
