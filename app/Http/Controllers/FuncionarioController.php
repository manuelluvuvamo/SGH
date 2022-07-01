<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcao;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Http;

class FuncionarioController extends Controller
{
    //
    public function list(){

        $data['funcionarios'] = Funcionario::join('funcaos', 'funcionarios.idFuncao', 'funcaos.id')

        ->select(
            'funcionarios.*',
            'funcaos.nome  as nome_funcao',
           
        )
        ->get();
        $data['page'] = "lista";
        return view('admin.funcionario.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        $data['funcaos'] = Funcao::all();
       
        return view('admin.funcionario.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['funcionario'] = Funcionario::join('funcaos', 'funcionarios.idFuncao', 'funcaos.id')

        ->select(
            'funcionarios.*',
            'funcaos.nome as nome_funcao',
           
        )
        ->where('funcionarios.id',$id)
        ->get()->first();
        $data['id'] =  $data['funcionario']->id;


        $data['funcaos'] = Funcao::all();
       
        return view('admin.funcionario.index',$data);
    }
      
   
    public function store(Request $request){


    //  try {
        $validator=$request->validate([
            'name' => ['required', 'string', 'max:32'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'idFuncao' => ['required'],       
           
        ]);
         

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            # code...
            //dd($request);
            $funcao = Funcao::find($request->idFuncao);
            $upload = $this->upload_img($request);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipo_conta' =>  $funcao->nome,
                'password' => Hash::make("12345678"),
            ]);

            if ($user) {
                # code...
                $funcionario = Funcionario::create([
                   
                    'idUser'=>$user->id,
                    'idFuncao'=>$request->idFuncao,
                    'nome'=>$request->nome,
                    'foto'=>$upload,
                    'genero'=>$request->genero,
                    'dataNascimento'=>$request->dataNascimento,
                    'estadoCivil'=>$request->estadoCivil,
                    'localNascimento'=>$request->localNascimento,
                    'nacionalidade'=>$request->nacionalidade,
                    'numBi'=>$request->numBi,
                    'filPai'=>$request->filPai,
                    'filMae'=>$request->filMae,
                    'iban'=>$request->iban,
                    'endereco'=>$request->endereco,
                    'telefone'=>$request->telefone,
                    
                ]);
            }
           
           
            return redirect()->back()->with('funcionario.create.success',1);
               
        }else {
            # code...
            $funcao = Funcao::find($request->idFuncao);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipo_conta' =>  $funcao->nome,
                'password' => Hash::make("12345678"),
            ]);

            if ($user) {
                # code...
                $funcionario = Funcionario::create([
                   
                    'idUser'=>$user->id,
                    'idFuncao'=>$request->idFuncao,
                    'nome'=>$request->nome,
                    'genero'=>$request->genero,
                    'dataNascimento'=>$request->dataNascimento,
                    'estadoCivil'=>$request->estadoCivil,
                    'localNascimento'=>$request->localNascimento,
                    'nacionalidade'=>$request->nacionalidade,
                    'numBi'=>$request->numBi,
                    'filPai'=>$request->filPai,
                    'filMae'=>$request->filMae,
                    'iban'=>$request->iban,
                    'endereco'=>$request->endereco,
                    'telefone'=>$request->telefone,
                    
                ]);
            }
            return redirect()->back()->with('funcionario.create.success',1);
           
        }
      
            

            /* if ($funcionario) {
                return redirect()->back()->with('funcionario.create.success',1);
               
            }else{
                return redirect()->back()->with('funcionario.create.error',1);
            } */
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('funcionario.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
         try {
             //dd( $request->coins);
           

                    # code...
                    $funcionario = Funcionario::findOrFail($id);
                    
 
                     
                    

                    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                        # code...
                        //dd($request);
                        $funcao = Funcao::find($request->idFuncao);
                        $upload = $this->upload_img($request);
                  
            
                        
                            # code...
                            $func = Funcionario::findOrFail($id)->update([
                               
                                
                                'idFuncao'=>$request->idFuncao,
                                'nome'=>$request->nome,
                                'foto'=>$upload,
                                'genero'=>$request->genero,
                                'dataNascimento'=>$request->dataNascimento,
                                'estadoCivil'=>$request->estadoCivil,
                                'localNascimento'=>$request->localNascimento,
                                'nacionalidade'=>$request->nacionalidade,
                                'numBi'=>$request->numBi,
                                'filPai'=>$request->filPai,
                                'filMae'=>$request->filMae,
                                'iban'=>$request->iban,
                                'endereco'=>$request->endereco,
                                'telefone'=>$request->telefone,
                                
                            ]);
                       
                       
                       
                        return redirect()->back()->with('funcionario.update.success',1);
                           
                    }else {
                        # code...
                        $funcao = Funcao::find($request->idFuncao);
            
                        
                            # code...
                            $func = Funcionario::findOrFail($id)->update([
                               
                                
                                'idFuncao'=>$request->idFuncao,
                                'nome'=>$request->nome,
                                'genero'=>$request->genero,
                                'dataNascimento'=>$request->dataNascimento,
                                'estadoCivil'=>$request->estadoCivil,
                                'localNascimento'=>$request->localNascimento,
                                'nacionalidade'=>$request->nacionalidade,
                                'numBi'=>$request->numBi,
                                'filPai'=>$request->filPai,
                                'filMae'=>$request->filMae,
                                'iban'=>$request->iban,
                                'endereco'=>$request->endereco,
                                'telefone'=>$request->telefone,
                                
                            ]);
                        return redirect()->back()->with('funcionario.update.success',1);
                       
                    }
                  
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('funcionario.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $funcionario = Funcionario::findOrFail($id);
            Funcionario::findOrFail($id)->delete();
        return redirect()->back()->with('funcionario.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('funcionario.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $funcionario = Funcionario::findOrFail($id);
            Funcionario::findOrFail($id)->forceDelete();
            if (is_dir($funcionario->foto)) {
                # code...
                unlink($funcionario->foto);
            }
        return redirect()->back()->with('funcionario.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('funcionario.purge.error',1);
        }
    }

    public function upload_img(Request $request){

        # code...
        $name = uniqid(date('HisYmd'));
        $image = $request->file('foto');
        // Recupera a extensão do arquivo
        $extension = $request->foto->extension();
        $nameFile = "{$name}.{$extension}";
        $destinationPath = public_path('/images/funcionario');
        $image->move($destinationPath, $nameFile);
        $upload = '/images/funcionario/' . $nameFile;

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {

                return $upload;

            }
    }

    public function contribuinte(Request $request){
        if(strlen($request->numBi)==14){
           
            $bi="$request->numBi";
            $response = Http::get("https://api.gov.ao/consultarBI/v2/?bi=$bi");
        // dd($response->object()!=[]);
         $data=$response->json();
            
            return $data;
          
        }
    }


    public function ver($id){
        $dados["funcionario"] = Funcionario::join('funcaos', 'funcionarios.idFuncao', 'funcaos.id')

        ->select(
            'funcionarios.*',
            'funcaos.nome  as nome_funcao',
           
        )->where('funcionarios.id',$id)->get()->first();

        $dados["experiencias"] = Experiencia::where("idFuncionario",$id);

        return view("admin.funcionario.ver",$dados);
    }

}
