<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use App\Categoria;

class PhonesController extends Controller
{
    //

    public function index(){
        //$empleados=Employee::with('products')->get();
       // return view('blanco',compact('empleados'));
        $datos=DB::table('compras')
        ->join('detalle_compras as dc','dc.compra_id','=','compras.id')
        ->join('proveedores as p','compras.proveedor_id','=','p.id')
        ->select('compras.id','compras.numcompra','p.nombre',
        DB::raw('sum(dc.cantidad*dc.precio) as total'))
        ->where('compras.id','=','1')
        ->groupBy('compras.id','compras.numcompra','p.nombre')
        ->orderBy('compras.id','asc')->get();

        return $datos;
    }
}
