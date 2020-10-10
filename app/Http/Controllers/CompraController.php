<?php

namespace App\Http\Controllers;
use App\Compra;
use App\DetalleCompra;

use Illuminate\Http\Request;
use App\Categoria;
use App\Product;
use App\Kardex;
use App\Proveedor;
use Carbon\Carbon;
use DB;

 
class CompraController extends Controller
{
    public function index(){
        $compras=DB::table('compras')
        ->join('users','compras.user_id','=','users.id')
        ->join('proveedores','compras.proveedor_id','=','proveedores.id')
        ->select('compras.*','users.nombre as usuario','proveedores.nombre as proveedor')
        ->orderBy('compras.id','desc')
        ->get();

        return view('page.compras.index',compact('compras'));
    }
    public function create(){
        $proveedores=Proveedor::orderBy('id','asc')->get();
        $productos=Product::orderBy('id','asc')->get();
        $categorias=Categoria::orderBy('id','asc')->get();
        return view('page.compras.create',compact(['categorias','productos','proveedores']));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $mytime= Carbon::now('America/Lima');
            $compra=new Compra;
            //$compra->numcompra=$request->numcompra;
            $compra->numcompra=$request->numcompra;
            $compra->user_id=\Auth::user()->id;
            $compra->proveedor_id=$request->proveedor;
            $compra->impuesto=0.18;
            $compra->estado=1;
            $compra->total=$request->total_compra;
            $compra->created_at=$mytime;
            $compra->save();
            
            $prod_id=$request->prod_id;
            $prod_cantidad=$request->prod_cantidad;
            $prod_precio=$request->prod_precio;

            $contador=0;

            while($contador<count($prod_id)){
                $detalle=new DetalleCompra();
                $detalle->compra_id=$compra->id;
                $detalle->product_id=$prod_id[$contador];
                $detalle->cantidad=$prod_cantidad[$contador];
                $detalle->precio=$prod_precio[$contador];
                $detalle->subtotal=$prod_cantidad[$contador]*$prod_precio[$contador];
                $detalle->save();

                $kardex=new Kardex();
                $kardex->product_id=$prod_id[$contador];
                $kardex->codigodocumento="DOCCO01";
                $kardex->numerodocumento=$compra->id;
                $kardex->cantidad=$prod_cantidad[$contador];
                $kardex->save();

                $contador=$contador+1;
            }
            DB::commit();

            }catch(Execption $e){  DB::rollback();  }
            
            return redirect('compra');
    }

    public function show($id){
        $compra=Compra::join('proveedores','compras.proveedor_id','=','proveedores.id')
        ->join('detalle_compras as dc','dc.compra_id','=','compras.id')
        ->select('compras.id','compras.numcompra','proveedores.nombre as proveedor',
        DB::raw('sum(dc.cantidad*dc.precio) as total'))
        ->where('compras.id','=',$id)
        ->orderBy('id','asc')
        ->groupBy('compras.id','compras.numcompra','proveedores.nombre')
        ->first();

        $detalles=DetalleCompra::join('products','detalle_compras.product_id','=','products.id')
        ->select('products.nombre','detalle_compras.cantidad','detalle_compras.precio')
        ->where('detalle_compras.compra_id','=',$id)
        ->orderBy('detalle_compras.id','asc')
        ->get();

        return view('page.compras.show',compact(['compra','detalles']));
    }

    public function destroy(Request $request){
        $compra=Compra::findOrFail($request->id);
        if($compra->estado==1){
            $compra->estado=false;
            $compra->save();}

        return redirect('compra');
    }

    public function pdf(){
 
    }
}
