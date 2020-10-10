<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{ 
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/usuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *'dni' => ['requerid','string', 'max:8'],
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        $roles=Roles::orderBy('id','asc')->paginate(10);
        return view('auth.register',compact('roles'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dni'=>['required','string','unique:users'],
            'telefono'=>['string','max:15'],
            'direccion'=>['string','max:100'],
            'usuario'=>['required','string','unique:users',],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'idrol' => ['required', 'string'],
            'estado'=>['string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     protected function create(array $data)
    { 
        $request=app('request');
        if ($request->hasFile('imagen')) {
            $fileNameCompleto=$request->file('imagen')->getClientOriginalName();
            $fileName=pathinfo($fileNameCompleto,PATHINFO_FILENAME);
            $fileExtension=$request->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$fileExtension;
            $path=$request->file('imagen')->storeAs('public/img/user/',$fileNameToStore); 
        }else{$fileNameToStore='noimagen.png';}
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'dni' => $data['dni'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'imagen'=>$fileNameToStore,
            'usuario' => $data['usuario'],
            'password' => Hash::make($data['password']),
            'idrol' => $data['idrol'],
            'estado'=>$data['estado'],
        ]);
    }
}
