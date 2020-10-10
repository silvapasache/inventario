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
<form class="" method="post" action="{{url('ventas')}}">
@csrf
        
        <div class="row">
          <div class="col-lg-5">
            <section class="panel" >
              <header class="panel-heading" style="background: #34aadc;color: #ffffff;">Orden de Venta</header>
              <div class="table-responsive" >
              <div class="panel-body">
                    <div class="form-group">
                        <label for="cliente">Clientes</label>
                        <select class="form-control" name="cliente" id="cliente" class="form-control">
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipodocumento">Documento</label>
                        <select id="tipodocumento" name="tipodocumento" class="form-control">
                            <option value="FACTURA">Factura</option>
                            <option value="BOLETA">Boleta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numdocumento">Numero de Documento</label>
                        <input type="text" name="numdocumento" id="numdocumento" class="form-control"  >
                    </div>
                    <!-- PRODUCTO-->
                    <div class="" style="border:solid 1px;padding: 10px 5px;border-color: #8b8daa9e;background: aliceblue;">
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <select id="producto" class="form-control">
                            @foreach($productos as $producto)
                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                            @endforeach
                        </select>
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
                                <label>stock</label>
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
    @include('page.ventas.script')
@endsection