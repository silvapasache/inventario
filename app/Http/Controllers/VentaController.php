<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleVenta;
use Carbon\Carbon;
use App\Cliente;
use App\Product;
use App\Kardex;
use App\Venta;
use App\User;

use DB;

class VentaController extends Controller
{
    //
    public function index(){
        $ventas=DB::table('ventas')
        ->join('clientes','ventas.cliente_id','=','clientes.id')
        ->join('users','ventas.user_id','=','users.id')
        ->select('ventas.*','clientes.nombre as cliente','users.nombre as responsable')
        ->orderBy('ventas.id','desc')
        ->get()
        ;
        return view('page.ventas.index',compact('ventas'));
    }
    public function create(){
        $clientes=Cliente::orderBy('id','desc')->get();
        $productos=Product::orderBy('id','desc')->get();
        return view('page.ventas.create',compact(['clientes','productos']));
    }

    public function store(Request $request){
        try{
        DB::beginTransaction();
        $mytime= Carbon::now('America/Lima');
        $venta=new Venta;
        $venta->tipodocumento=$request->tipodocumento;
        $venta->numdocumento=$request->numdocumento;
        $venta->cliente_id=$request->cliente;
        $venta->user_id=\Auth::user()->id;
        $venta->impuesto=0.18;
        $venta->subtotal=0;
        $venta->totalimpuesto=0;
        $venta->total=$request->total_compra;
        $venta->fechaventa=$mytime->toDateString();
        $venta->save();

        $prod_id=$request->prod_id;
        $cantidad=$request->prod_cantidad;
        $precio=$request->prod_precio;
        $contador=0;
        
        while($contador<count($prod_id)){
            $detalle=new DetalleVenta;
            $detalle->venta_id=$venta->id;
            $detalle->product_id=$prod_id[$contador];
            $detalle->cantidad=$cantidad[$contador];
            $detalle->precio=$precio[$contador];
            $detalle->subtotal=$precio[$contador]*$cantidad[$contador];
            $detalle->save();

            $kardex=new Kardex();
            $kardex->product_id=$prod_id[$contador];
            $kardex->codigodocumento="DOCVE01";
            $kardex->numerodocumento=$venta->id;
            $kardex->cantidad=$cantidad[$contador];
            $kardex->save();

            $contador=$contador+1;
        }
        DB::commit();

        } catch(Exception $e){
            DB::rollback();
        }
        return redirect('ventas');
    }

    public function show($id){
        $venta=Venta::join('detalle_ventas as dv','dv.venta_id','=','ventas.id')
        ->join('clientes','ventas.cliente_id','=','clientes.id')
        ->select('ventas.id','ventas.tipodocumento','ventas.numdocumento','clientes.nombre as cliente',
        DB::raw('sum(dv.cantidad*dv.precio) as total'))
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id','asc')
        ->groupBy('ventas.id','clientes.nombre','ventas.tipodocumento','ventas.numdocumento')
        ->first();

        $detalles=DetalleVenta::join('products','detalle_ventas.product_id','=','products.id')
        ->select('products.nombre','detalle_ventas.cantidad','detalle_ventas.precio')
        ->where('detalle_ventas.venta_id','=',$id)
        ->orderBy('detalle_ventas.id','asc')
        ->get();

        return view('page.ventas.show',compact(['venta','detalles']));
    }

    public function destroy(Request $request){
        $venta=Venta::findOrFail($request->id);
        if($venta->estado==true){$venta->estado=false;
        $venta->save();}
        return redirect('ventas');
    }

}
