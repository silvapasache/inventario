@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
         <!--   <h3 class="page-header"><i class="fa fa-shopping-cart"></i> Compras</h3>-->
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-shopping-cart"></i><a href="{{url('ventas')}}">Ventas</a></li>
              <li><i class="fa fa-plus"></i>Detalles de Ventas</li>

          </div>
        </div>
        
        <!--CONTENIDO-->

        
        <div class="row">
          <div class="col-lg-5">
            <section class="panel" >
              <header class="panel-heading" style="background: #34aadc;color: #ffffff;">Orden de compra: Nª {{$venta->numdocumento}}</header>
              <div class="table-responsive" >
              <div class="panel-body">
                    <div class="form-group">
                        <label for="proveedor">Cliente</label>
                        <select class="form-control" name="proveedor" id="proveedor" class="form-control" disabled>
                            
                            <option value="" >{{$venta->cliente}}</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <select class="form-control" disabled>
                            <option>{{$venta->tipodocumento}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numcompra">Numero de Documento</label>
                        <input type="text" name="numcompra" id="numcompra" class="form-control" value="{{$venta->numdocumento}}" disabled>
                    </div>
                    <!-- PRODUCTO-->

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
                            <th>#</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tfoot class="table-warning">
                        <tr>
                            <th colspan="4" style="text-align: right;">Total Items (S/.)</th>
                            <th ><span id="total_items">S/. {{number_format($venta->total,2)}}</span></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align: right;">Total Impuesto (S/.)</th>
                            <th><span id="total_impuesto">S/. {{number_format($venta->total*18/100,2)}}</span></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align: right;">Total (S/.)</th>
                            <th><span id="total">S/. {{number_format($venta->total+$venta->total*18/100,2)}}</span></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($detalles as $detalle)
                    <tr>
                        <td></td>
                        <td>{{$detalle->nombre}}</td>
                        <td>{{$detalle->cantidad}}</td>
                        <td>{{$detalle->precio}}</td>
                        <td>{{number_format($detalle->precio*$detalle->cantidad,2)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>   
            <div class="" style="text-align:center;padding-bottom:5px;">

            </div>
            </section>
           </div>
        </div>


        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>
<!--STAR MODAL --> 

<!--END MODAL -->
@endsection
