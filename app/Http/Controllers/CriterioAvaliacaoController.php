<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\CriterioAvaliacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CriterioAvaliacaoController extends Controller
{
    //
    public function list(){

        $data['criterios'] = CriterioAvaliacao::All();

      
        $data['page'] = "lista";
        return view('admin.criterio.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.criterio.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['criterio'] = CriterioAvaliacao::find($id);
        $data['id'] =  $data['criterio']->id;
        //dd( $data['criterio']);
        return view('admin.criterio.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:criterio_avaliacaos'],

        ]);
         
            $criterio = CriterioAvaliacao::create([
                'nome' => $request->nome,
            ]);
    
            return redirect()->back()->with('criterio.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('criterio.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $criterio = CriterioAvaliacao::findOrFail($id);
                  
                        $dep = CriterioAvaliacao::findOrFail($id)->update([
                            'nome' => $request->nome,
                        ]);
                   
                    return redirect()->back()->with('criterio.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('criterio.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $criterio = CriterioAvaliacao::findOrFail($id);
            CriterioAvaliacao::findOrFail($id)->delete();
        return redirect()->back()->with('criterio.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('criterio.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $criterio = CriterioAvaliacao::findOrFail($id);
            CriterioAvaliacao::findOrFail($id)->forceDelete();
        return redirect()->back()->with('criterio.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('criterio.purge.error',1);
        }
    }
}
