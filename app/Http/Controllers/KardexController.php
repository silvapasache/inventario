<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class KardexController extends Controller
{
    //
    public function show($id){
        $kardexes=DB::table('kardexes')
            ->select('kardexes.*')
            ->where('kardexes.product_id','=',$id)
            ->orderBy('id','asc')
            ->get();
        $producto=Product::select('nombre','stock')
        ->where('id','=',$id)
        ->first();
        return view('page.producto.kardex',compact(['kardexes','producto']));
    }
}
