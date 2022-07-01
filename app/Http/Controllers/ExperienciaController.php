<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Experiencia;
use Illuminate\Support\Facades\Auth;

class ExperienciaController extends Controller
{
    //

    public function update(Request $request,$id ){
            
        try {
                /* $validator=$request->validate([
                    'nome' => ['required', 'string', 'max:255'],
                   
                ]); */

               
                   
                    $experiencia = Experiencia::findOrFail($id);
                  
                        $exp = Experiencia::findOrFail($id)->update([
                           
                            'idFuncionario'=>$id,
                            'instituicao' => $request->instituicao,
                            'cargo' => $request->cargo,
                            'funcao' => $request->funcao,
                            'dataInicio' => $request->dataInicio,
                            'dataFim' => $request->dataFim,
                        ]);
                   
                    return redirect()->back()->with('experiencia.update.success',1);
               
                
            
        } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('experiencia.update.error',1);
        }
    }

}
