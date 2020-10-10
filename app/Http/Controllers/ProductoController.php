<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Categoria;
use App\Product;

use DB;

class ProductoController extends Controller
{
    //
    public function index(){
        $productos=DB::table('products')
        ->join('categorias','products.categoria_id','=','categorias.id')
        ->select('products.*','categorias.nombre as categoria')
        ->paginate(5);

        $categorias=Categoria::orderBy('id','asc')->paginate(10);

        return view('page.producto.index',compact(['productos','categorias']));
    }

    public function store(Request $request){
        $producto=new Product;
        $producto->nombre=$request->nombre;
        $producto->categoria_id=$request->categoria;
        if($request->stock){$producto->stock=$request->stock;}
        $producto->estado=$request->estado;
        if ($request->hasFile('imagen')) {
            $fileNameCompleto=$request->file('imagen')->getClientOriginalName();
            $fileName=pathinfo($fileNameCompleto,PATHINFO_FILENAME);
            $fileExtension=$request->file('imagen')->guessClientExtension();
            $fileNameToStore=time().'.'.$fileExtension;
            $path=$request->file('imagen')->storeAs('public/img/productos/',$fileNameToStore); 
        }else{$fileNameToStore='noimagen.png';}
        $producto->imagen=$fileNameToStore;
        $producto->save();
        return redirect('producto');
        }

        public function update(Request $request){
            $producto=Product::findOrFail($request->id_producto);
            $producto->nombre=$request->nombre;
            $producto->categoria_id=$request->categoria;
            $producto->stock=$request->stock;
            $producto->estado=$request->estado;
            if ($request->hasFile('imagen')) {
                Storage::delete('public/img/productos/'.$producto->imagen);
                $fileNameCompleto=$request->file('imagen')->getClientOriginalName();
                $fileName=pathinfo($fileNameCompleto,PATHINFO_FILENAME);
                $fileExtension=$request->file('imagen')->guessClientExtension();
                $fileNameToStore=time().'.'.$fileExtension;
                $path=$request->file('imagen')->storeAs('public/img/productos/',$fileNameToStore); 
                $producto->imagen=$fileNameToStore;
            }else{}
            $producto->save();
            return redirect('producto');
        }

        public function destroy($id){
            $producto=Product::findOrFail($id);
            if($producto->imagen!="noimagen.pgn"){
                Storage::delete('public/img/productos/'.$producto->imagen);
            }
            Product::find($id)->delete();
            return redirect('producto');
        }

    }

