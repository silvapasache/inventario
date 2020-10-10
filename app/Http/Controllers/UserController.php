<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use App\User;
use App\Roles;
use DB;

class UserController extends Controller
{
    //


    public function index(){
        $usuarios=DB::table('users')
        ->join('roles','users.idrol','=','roles.id')
        ->select('users.*','roles.rol as rol')
        ->paginate(10);

        $roles=Roles::orderBy('id','asc')->paginate(5);
        return view('page.permisos.usuarios.panel',compact(['usuarios','roles']));

    }
     function store(Request $user)
    { 
        $this->validator($user)->validate();
        $usuario=new User;
        $request=app('request');
        if ($user->hasFile('imagen')) {
            $fileNameCompleto=$user->file('imagen')->getClientOriginalName();
            $fileName=pathinfo($fileNameCompleto,PATHINFO_FILENAME);
            $fileExtension=$user->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$fileExtension;
            $path=$user->file('imagen')->storeAs('public/img/user/',$fileNameToStore); 
        }else{$fileNameToStore='noimagen.png';}

        $usuario->nombre=$user->nombre;
        $usuario->email=$user->email;
        $usuario->dni=$user->dni;
        $usuario->telefono=$user->telefono;
        $usuario->direccion=$user->direccion;
        $usuario->imagen=$fileNameToStore;
        $usuario->usuario=$user->usuario;
        $usuario->password=Hash::make($user->password);
        $usuario->idrol=$user->idrol;
        $usuario->estado=$user->estado;
        $usuario->save();
        return redirect('usuario');
    }
    public function update(Request $request){
        $usuario=User::findOrFail($request->id_usuario);
        if ($request->hasFile('imagen')) {
            Storage::delete('public/img/user/'.$usuario->imagen);
            $fileNameCompleto=$request->file('imagen')->getClientOriginalName();
            $fileName=pathinfo($fileNameCompleto,PATHINFO_FILENAME);
            $fileExtension=$request->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$fileExtension;
            $path=$request->file('imagen')->storeAs('public/img/user/',$fileNameToStore); 
            $usuario->imagen=$fileNameToStore;
        }
        if($usuario->password!=$request->password){
            $usuario->password=Hash::make($request->password);
        }else{}
        $usuario->nombre=$request->nombre;
        $usuario->email=$request->email;
        $usuario->dni=$request->dni;
        $usuario->telefono=$request->telefono;
        $usuario->direccion=$request->direccion;
        $usuario->usuario=$request->usuario;
        $usuario->idrol=$request->idrol;
        $usuario->estado=$request->estado;
        $usuario->save();
        return redirect('usuario');
    }

    public function destroy($id){
        $usuario=User::findOrFail($id);
        $imagen=$usuario->imagen;
        if($imagen!='noimagen.png'){
            Storage::delete('public/img/user/'.$imagen);
        }
        User::find($id)->delete();
        return back();
    }

    function validator(Request $request){
        return Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dni'=>['required','string','unique:users'],
            'telefono'=>['string','max:15'],
            'direccion'=>['string','max:100'],
            'usuario'=>['required','string','unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'idrol' => ['required', 'string'],
            'estado'=>['string'],
        ]);
    }
}
