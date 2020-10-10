<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Compra;
use App\Venta;
use DB;

class PanelController extends Controller
{
    //
    public function index(){
        $compras=Compra::select(DB::raw('sum(compras.total) as compra_total'))
        ->where('estado','=','1')
        ->first();

        $ventas=Venta::select(DB::raw('sum(ventas.total) as venta_total'))
        ->where('estado','=','1')
        ->first();

        $producto=Product::select(DB::raw('sum(products.stock) as stock_total'))
        ->first();

        return view('page.principal',compact(['compras','ventas','producto']));
    }
}
