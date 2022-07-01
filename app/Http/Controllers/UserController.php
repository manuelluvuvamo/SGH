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

    public function upload_img(Request $request){

        # code...
        $name = uniqid(date('HisYmd'));
        $image = $request->file('profile_photo_path');
        // Recupera a extensão do arquivo
        $extension = $request->profile_photo_path->extension();
        $nameFile = "{$name}.{$extension}";
        $destinationPath = public_path('/images/user');
        $image->move($destinationPath, $nameFile);
        $upload = '/images/user/' . $nameFile;

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

    public function updateProfile(Request $request,$id ){
            //dd($request);
        try {
               $validator=$request->validate([
                   'name' => ['required', 'string', 'max:255'],
                   'email' => ['required', 'string', 'email', 'max:255', ],
    
                  
               ]);

               if ($request->hasFile('profile_photo_path') && $request->file('profile_photo_path')->isValid()) {
                   

                    # code...
                    $upload = $this->upload_img($request);

                    $user = User::findOrFail($id);
                  
                        # code...
                        $usr = User::findOrFail($id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                           
                            'profile_photo_path'=>$upload,
                           
                        ]);

                        if (is_dir($user->profile_photo_path)) {
                            # code...
                            unlink($user->profile_photo_path);
                        }
                        
                    
                    return redirect()->back()->with('user.update.profile.success',1);
               } else {
                   # code...
                   $user = User::findOrFail($id);
                   
                  
                    $usr = User::findOrFail($id)->update([
                       'name' => $request->name,
                       'email' => $request->email,
                          
                           
                    ]);
                   
                   return redirect()->back()->with('user.update.profile.success',1);
               }
               
           
       } catch (\Throwable $th) {
               //throw $th;
           return redirect()->back()->with('user.update.profile.error',1);
       }
   }

   public function updatePass(Request $request,$id ){
    //dd($request);
          try {
            $validator=$request->validate([
                 'password' => ['required', 'string', 'min:8','confirmed'],
          
            ]);
            $user = User::findOrFail($id);
            //dd(Hash::make($request->currentPassword));
            if(Hash::check($request->currentPassword, $user->password)) {
                # code...
                $usr = User::findOrFail($id)->update([
                    'password' => Hash::make($request->password),
                    
                ]);

                Auth::login($usr);
            
            return redirect()->back()->with('user.update.pass.success',1);
            }else{
                return redirect()->back()->with('user.update.pass.error',1);
            }
               
   
        } catch (\Throwable $th) {
            //throw $th;
        return redirect()->back()->with('user.update.pass.error',1);
        }
    }
}
