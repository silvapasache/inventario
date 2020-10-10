@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
         <!--   <h3 class="page-header"><i class="fa fa-shopping-cart"></i> Compras</h3>-->
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-shopping-cart"></i><a href="{{url('compra')}}">Compras</a></li>
              <li><i class="fa fa-plus"></i>Agregar</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
<form class="" method="post" action="{{url('compra')}}">
@csrf
        
        <div class="row">
          <div class="col-lg-5">
            <section class="panel" >
              <header class="panel-heading" style="background: #34aadc;color: #ffffff;">Orden de compra</header>
              <div class="table-responsive" >
              <div class="panel-body">
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select class="form-control" name="proveedor" id="proveedor" class="form-control">
                            @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <select class="form-control">
                            <option>Factura</option>
                            <option>Boleta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numcompra">Numero de compra</label>
                        <input type="text" name="numcompra" id="numcompra" class="form-control"  >
                    </div>
                    <!-- PRODUCTO-->
                    <div class="" style="border:solid 1px;padding: 10px 5px;border-color: #8b8daa9e;background: aliceblue;">
                    <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" onchange="filtrar()">
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="producto">Producto</label>
                            <select id="producto" class="form-control">
                                @foreach($productos as $producto)
                                <option value="{{$producto->id}}" data-categoria="{{$producto->categoria_id}}" hidden>{{$producto->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <div class="col-lg-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" min="0" >
                            </div> 
                            <div class="col-lg-4">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-control" min="0" >
                            </div> 
                            <div class="col-lg-4">
                                <button type="button" id="agregar" class="btn btn-primary form-comtrol"><i class="fa fa-plus"></i>Agregar</button>
                            </div> 
                            
                        </div>
                    </div>
                </div>
                    <!--END PRODUCTO-->

              </div>
             </div>
            </section>
          </div>
          
          <div class="col-lg-7">
            <section class="panel" >
            <header class="panel-heading" style="background: #34aadc;color: #ffffff;">Articulos</header>
            <div class="table-responsive">
                <table class="table  table-bordered " id="detalles">
                    <thead class="table-warning">
                        <tr>
                            <th>Accion</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot class="table-warning">
                        <tr>
                            <th colspan="4" style="text-align: right;">Total Items (S/.)</th>
                            <th ><span id="total_items">S/. 0.00</span></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align: right;">Total Impuesto (S/.)</th>
                            <th><span id="total_impuesto">S/. 0.00</span></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align: right;">Total (S/.)</th>
                            <th><input id="total_compra" name="total_compra" type="hidden"><span id="total">S/. 0.00</span></th>
                        </tr>
                    </tfoot>
                </table>
            </div>   
            <div class="" style="text-align:center;padding-bottom:5px;">
                <button type="submit" class="btn btn-success" id="btnSave">
                <i class="fa fa-save" style="font-size:30px;"></i>
                Guardar</button>
            </div>
            </section>
           </div>
        </div>
</form>

        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>
<!--STAR MODAL --> 

<!--END MODAL -->
@endsection
@section('scripts')
    @include('page.compras.script')
<script type="text/javascript">
function filtrar(){
    var id=$("#categoria option:selected").val();
    $("#producto option[data-categoria="+id+"]").hide();
}
</script>
@endsection