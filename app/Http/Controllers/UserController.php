<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
     //
     public function list(){

        $data['users'] = User::All();

      
        $data['page'] = "lista";
        return view('admin.user.index',$data);
    }


    public function create(){
        
        $data['page'] = "criar";
        return view('admin.user.index',$data);
    }
    
    public function edit($id){

        $data['page'] = "editar";
        $data['user'] = User::find($id);
        $data['id'] =  $data['user']->id;
        //dd( $data['user']);
        return view('admin.user.index',$data);
    }

    public function store(Request $request){

        
    //  try {
        $validator=$request->validate([
            'nome' => ['required', 'string', 'max:32', 'unique:users'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);
         
            $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipo_conta' =>  $request->tipo_conta,
                'password' => Hash::make( $request->password),
                
            ]);
            return redirect()->back()->with('user.create.success',1);
        
        
    //  } catch (\Throwable $th) {
    //      //throw $th;
    //      return redirect()->back()->with('user.create.error',1);
    //  }
    }
    public function update(Request $request,$id ){
            
       /*  try { */
            $validator=$request->validate([
                'name' => ['required', 'string', 'max:32', ], 
                'email' => ['required', 'string', 'email', 'max:255', ],
                'password' => ['required', 'string', 'min:8','confirmed'],
    
            ]);
            
               
                   
                    $user = User::findOrFail($id);
                  
                        $us = User::findOrFail($id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'tipo_conta' =>  $request->tipo_conta,
                            'password' => Hash::make( $request->password),
                        ]);
                   
                    return redirect()->back()->with('user.update.success',1);
               
                
            
      /*   } catch (\Throwable $th) {
                //throw $th;
            return redirect()->back()->with('user.update.error',1);
        } */
    }

    public function delete($id){
        try {
            
            $user = User::findOrFail($id);
            User::findOrFail($id)->delete();
        return redirect()->back()->with('user.delete.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.delete.error',1);
        }
    }
    public function purge($id){
        try {
            
            $user = User::findOrFail($id);
            User::findOrFail($id)->forceDelete();
        return redirect()->back()->with('user.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('user.purge.error',1);
        }
    }
}
