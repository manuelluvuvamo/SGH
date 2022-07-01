<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Auth;
class InstituicaoController extends Controller
{
    //
    public function list(){

        $data['instituicao'] = Instituicao::get()->first();

      
        $data['page'] = "lista";
        return view('admin.instituicao.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.instituicao.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['instituicao'] = Instituicao::find($id);
        $data['id'] =  $data['instituicao']->id;
        //dd( $data['instituicao']);
        return view('admin.instituicao.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nomeCurto' => ['required', 'string', 'max:255','unique:instituicaos'],
            'nomeLongo' => ['required', 'string', 'max:255','unique:instituicaos'],

        ]);
         
            $instituicao = Instituicao::create([
                'nomeCurto'=>$request->nomeCurto,
                'nomeLongo' =>$request->nomeLongo,
                
                'missao' =>$request->missao,
                'iban' =>$request->iban,
                'nif' =>$request->nif,
                'telefone1' =>$request->telefone1,
                'telefone2' =>$request->telefone2,
                'email1' =>$request->email1,
                'email2' =>$request->email2,
                'endereco' =>$request->endereco,
            ]);
    
            return redirect()->back()->with('instituicao.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('instituicao.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nomeCurto' => ['required', 'string', 'max:255'],
                    'nomeLongo' => ['required', 'string', 'max:255'],
                   
                ]);

                if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                    # code...
                    //dd($request);
                    $upload = $this->upload_img($request);
                    $instituicao = Instituicao::findOrFail($id);
                        //dd($upload);
                        $inst = Instituicao::findOrFail($id)->update([
                            'nomeCurto'=>$request->nomeCurto,
                            'nomeLongo' =>$request->nomeLongo,
                            'logo' => $upload ,
                            'missao' =>$request->missao,
                            'iban' =>$request->iban,
                            'nif' =>$request->nif,
                            'telefone1' =>$request->telefone1,
                            'telefone2' =>$request->telefone2,
                            'email1' =>$request->email1,
                            'email2' =>$request->email2,
                            'endereco' =>$request->endereco,
                        ]);

                        if (is_dir($instituicao->logo)) {
                            # code...
                            unlink($instituicao->logo);
                        }
                        return redirect()->back()->with('instituicao.update.success',1);
                }else {
                    # code...
                    $instituicao = Instituicao::findOrFail($id);
                  
                    $inst = Instituicao::findOrFail($id)->update([
                        'nomeCurto'=>$request->nomeCurto,
                        'nomeLongo' =>$request->nomeLongo,
                        'logo' =>$request->logo,
                        'missao' =>$request->missao,
                        'iban' =>$request->iban,
                        'nif' =>$request->nif,
                        'telefone1' =>$request->telefone1,
                        'telefone2' =>$request->telefone2,
                        'email1' =>$request->email1,
                        'email2' =>$request->email2,
                        'endereco' =>$request->endereco,
                    ]);
                    return redirect()->back()->with('instituicao.update.success',1);
                }
               
                   
                    
                   
                   
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('instituicao.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $instituicao = Instituicao::findOrFail($id);
            Instituicao::findOrFail($id)->delete();
        return redirect()->back()->with('instituicao.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('instituicao.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $instituicao = Instituicao::findOrFail($id);
            Instituicao::findOrFail($id)->forceDelete();
        return redirect()->back()->with('instituicao.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('instituicao.purge.error',1);
        }
    }

    public function upload_img(Request $request){

        # code...
        $name = uniqid(date('HisYmd'));
        $image = $request->file('logo');
        // Recupera a extensão do arquivo
        $extension = $request->logo->extension();
        $nameFile = "{$name}.{$extension}";
        $destinationPath = public_path('/images/instituicao');
        $image->move($destinationPath, $nameFile);
        $upload = '/images/instituicao/' . $nameFile;

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
}
