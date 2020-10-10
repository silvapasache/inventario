<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    //
    public function index(){
        $clientes=Cliente::orderBy('id','asc')->paginate(10);
        return view('page.clientes.index',compact('clientes'));
    }
    public function store(Request $request){
        $this->validator($request)->validate();
        $cliente=new Cliente;
        $cliente->nombre=$request->nombre;
        $cliente->tipo_documento=$request->tipo_documento;
        $cliente->numero=$request->numero;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->direccion=$request->direccion;
        $cliente->save();
        return redirect('clientes');
    }
    function validator(Request $request){
        return Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'max:255'],
            'numero'=>['required','string','unique:clientes'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'direccion'=>['string','max:100'],
        ]);
    }
}
