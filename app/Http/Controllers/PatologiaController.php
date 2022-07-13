<?php

namespace App\Http\Controllers;
use App\Models\Patologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;

class PatologiaController extends Controller
{
    //
    public function list(){

        $data['patologias'] = Patologia::All();

      
        $data['page'] = "lista";
        return view('admin.patologia.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.patologia.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['patologia'] = Patologia::find($id);
        $data['id'] =  $data['patologia']->id;
        //dd( $data['patologia']);
        return view('admin.patologia.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:patologias'],

        ]);
         
            $patologia = Patologia::create([
                'nome' => $request->nome,
                
            ]);
    
            return redirect()->back()->with('patologia.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('patologia.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $patologia = Patologia::findOrFail($id);
                  
                        $dep = Patologia::findOrFail($id)->update([
                            'nome' => $request->nome,
                            
                        ]);
                   
                    return redirect()->back()->with('patologia.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('patologia.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $patologia = Patologia::findOrFail($id);
            Patologia::findOrFail($id)->delete();
        return redirect()->back()->with('patologia.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('patologia.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $patologia = Patologia::findOrFail($id);
            Patologia::findOrFail($id)->forceDelete();
        return redirect()->back()->with('patologia.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('patologia.purge.error',1);
        }
    }
}
