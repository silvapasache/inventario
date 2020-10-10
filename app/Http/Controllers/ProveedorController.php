<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    //
    public function index(){
        $proveedores=Proveedor::orderBy('id','asc')->paginate(10);
        return view('page.proveedores.index',compact('proveedores'));
    }
    public function store(Request $request){
        $proveedor=new Proveedor;
        $proveedor->nombre=$request->nombre;
        $proveedor->tipo_documento=$request->tipo_documento;
        $proveedor->numero=$request->numdocumento;
        $proveedor->telefono=$request->telefono;
        $proveedor->email=$request->email;
        $proveedor->direccion=$request->direccion;
        $proveedor->save();
        return redirect('proveedores');
    }
}
