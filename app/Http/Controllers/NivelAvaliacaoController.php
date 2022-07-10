<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\NivelAvaliacao;
use Illuminate\Support\Facades\Auth;

class NivelAvaliacaoController extends Controller
{
    //
    public function list(){

        $data['nivels'] = NivelAvaliacao::All();

      
        $data['page'] = "lista";
        return view('admin.nivel.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.nivel.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['nivel'] = NivelAvaliacao::find($id);
        $data['id'] =  $data['nivel']->id;
        //dd( $data['nivel']);
        return view('admin.nivel.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:nivel_avaliacaos'],

        ]);
         
            $nivel = NivelAvaliacao::create([
                'nome' => $request->nome,
            ]);
    
            return redirect()->back()->with('nivel.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('nivel.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $nivel = NivelAvaliacao::findOrFail($id);
                  
                        $dep = NivelAvaliacao::findOrFail($id)->update([
                            'nome' => $request->nome,
                        ]);
                   
                    return redirect()->back()->with('nivel.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('nivel.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $nivel = NivelAvaliacao::findOrFail($id);
            NivelAvaliacao::findOrFail($id)->delete();
        return redirect()->back()->with('nivel.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('nivel.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $nivel = NivelAvaliacao::findOrFail($id);
            NivelAvaliacao::findOrFail($id)->forceDelete();
        return redirect()->back()->with('nivel.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('nivel.purge.error',1);
        }
    }
}
