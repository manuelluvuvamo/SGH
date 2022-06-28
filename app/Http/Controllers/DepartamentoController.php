<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    //
    public function list(){

        $data['departamentos'] = Departamento::All();

      
        $data['page'] = "lista";
        return view('admin.departamento.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.departamento.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['departamento'] = Departamento::find($id);
        $data['id'] =  $data['departamento']->id;
        //dd( $data['Departamento']);
        return view('admin.departamento.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:255','unique:departamentos'],

        ]);
         
            $departamento = Departamento::create([
                'nome' => $request->nome,
                'responsavel' => $request->responsavel,
            ]);
    
            return redirect()->back()->with('departamento.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('departamento.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
        try {
                $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]);

               
                   
                    $departamento = Departamento::findOrFail($id);
                  
                        $dep = Departamento::findOrFail($id)->update([
                            'nome' => $request->nome,
                            'responsavel' => $request->responsavel,
                        ]);
                   
                    return redirect()->back()->with('departamento.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('departamento.update.error',1);
        }
    }

    public function delete($id){
        try {
            
            $departamento = Departamento::findOrFail($id);
            Departamento::findOrFail($id)->delete();
        return redirect()->back()->with('departamento.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('departamento.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $departamento = Departamento::findOrFail($id);
            Departamento::findOrFail($id)->forceDelete();
        return redirect()->back()->with('departamento.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('departamento.purge.error',1);
        }
    }
}
