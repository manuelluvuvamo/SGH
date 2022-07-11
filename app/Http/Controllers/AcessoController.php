<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Acesso;
use App\Models\Departamento;
use App\Models\Funcao;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Models\Funcionario;
use App\Models\User;

class AcessoController extends Controller
{
    //
    public function list(){

        $data['acessos'] = Acesso::join('funcionarios', 'acessos.idFuncionario', 'funcionarios.id')
        ->join('users', 'acessos.idUser', 'users.id')
        ->select(
            'acessos.*',
            'funcionarios.nome  as nome_funcionario',
            'users.name  as nome_usuario',
           
        )
        ->orderBy('acessos.menu')
        ->get();
        $data['page'] = "lista";
        return view('admin.acesso.index',$data);
    }


    public function create($tipo){

        //dd($tipo);
        
        $data['page'] = "criar";
        $data['funcionarios'] = Funcionario::all();
        $data['users'] = User::all();
        $data['tipo']= $tipo;
        $data['departamentos'] = Departamento::all();
        $data['funcaos'] = Funcao::all();
       
        return view('admin.acesso.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['acesso'] = Acesso::join('funcionarios', 'acessos.idFuncionario', 'funcionarios.id')
        ->join('users', 'acessos.idUser', 'users.id')
        ->select(
            'acessos.*',
            'funcionarios.nome  as nome_funcionario',
            'users.name  as nome_usuario',
           
        )
        ->where('acessos.id',$id)
        ->get()->first();
        $data['id'] =  $data['acesso']->id;


        $data['funcionarios'] = Funcionario::all();
        $data['users'] = User::all();
        return view('admin.acesso.index',$data);
    }
      
   
    public function store(Request $request){


      try {
       
        

        if (isset($request->tipo)) {
            # code...
            switch ($request->tipo) {
                case 'utilizador':
                    # code...
                    $funcionario = Funcionario:: where("idUser",$request->idUser)->get()->first();
      
                    $acesso = Acesso::create([
                    
                        'idFuncionario' => $funcionario->id,
                        'idUser' => $request->idUser,
                        'menu' => $request->menu,
                        'nivel' => $request->nivel,
                        
                        
                    ]);
                break;
                case 'funcao':
                    # code...

                    $funcionarios = Funcionario::where('idFuncao',$request->idFuncao)->get();

                    foreach ($funcionarios as  $funcionario) {
                        # code...
                        $user = User:: where("id",$funcionario->idUser)->get()->first();
                        $acesso = Acesso::create([
                    
                            'idFuncionario' => $funcionario->id,
                            'idUser' => $user->id,
                            'menu' => $request->menu,
                            'nivel' => $request->nivel,
                            
                            
                        ]);
                    }

                   
                break;

                case 'departamento':
                    # code...
                    $funcaos = Funcao::where('id_departamento',$request->idDepartamento)->get();

                    foreach ($funcaos as $funcao) {
                        # code...
                        $funcionarios = Funcionario::where('idFuncao',$funcao->id)->get();
                        foreach ($funcionarios as  $funcionario) {
                            # code...
                            $user = User:: where("id",$funcionario->idUser)->get()->first();
                            $acesso = Acesso::create([
                        
                                'idFuncionario' => $funcionario->id,
                                'idUser' => $user->id,
                                'menu' => $request->menu,
                                'nivel' => $request->nivel,
                                
                                
                            ]);
                        }
                    }
                   
                  
                break;
                
                default:
                    # code...
                    $funcionario = Funcionario:: where("idUser",$request->idUser)->get()->first();
      
                    $acesso = Acesso::create([
                    
                        'idFuncionario' => $funcionario->id,
                        'idUser' => $request->idUser,
                        'menu' => $request->menu,
                        'nivel' => $request->nivel,
                        
                        
                    ]);
                    break;
            }
        }
      
   

        

            if ($acesso) {
              
                return redirect()->back()->with('acesso.create.success',1);
            }else{
                return redirect()->back()->with('acesso.create.error',1);
            }
        
        
     } catch (\Throwable $th) {
         //throw $th;
         return redirect()->back()->with('acesso.create.error',1);
     }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $acesso = Acesso::findOrFail($id);
                    
                    $funcionario = Funcionario:: where("idUser",$request->idUser)->get()->first();
      
                     
                     $exp = Acesso::findOrFail($id)->update([
                        'idFuncionario' => $funcionario->id,
                        'idUser' => $request->idUser,
                        'menu' => $request->menu,
                        'nivel' => $request->nivel,
                        
                    ]);
    
                         if ($exp) {
                        # code...
                        
                           
                            return redirect()->back()->with('acesso.update.success',1);
                        }else{
                            return redirect()->back()->with('acesso.update.error',1);
                        }
                   
                
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('acesso.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $acesso = Acesso::findOrFail($id);
            Acesso::findOrFail($id)->delete();
        return redirect()->back()->with('acesso.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('acesso.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $acesso = Acesso::findOrFail($id);
            Acesso::findOrFail($id)->forceDelete();
        
        return redirect()->back()->with('acesso.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('acesso.purge.error',1);
        }
    }
}
