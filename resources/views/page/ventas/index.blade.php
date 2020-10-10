@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-shopping-cart"></i> Ventas</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-shopping-cart"></i>Ventas</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-12">
          </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <header class="panel-heading">Listado de Ventas</header>
            <div class="row" style="padding:1px;">
                <form class="navbar-form">
                 <input id="searchBox" class="form-control" placeholder="Search" type="text">
                </form>
                <a href="{{route('ventas.create')}}" class="btn btn-danger"><i class="fa fa-plus"></i>Agregar</a>
            </div>
            </section>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
           </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <div class="table-responsive" >
              
              <table class="table" id="tablaContenido">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Tipo</th>
                          <th>numero</th>
                          <th>cliente</th>
                          <th>resposable</th>
                          <th>impuesto</th>
                          <th>total</th>
                          <th>Fecha Emision</th>
                          <th>Estado</th>
                          <th>Opcion</th>

                      </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->tipodocumento}}</td>
                        <td>{{$venta->numdocumento}}</td>
                        <td>{{$venta->cliente}}</td>
                        <td>{{$venta->responsable}}</td>
                        <td>{{$venta->impuesto*100}}%</td>
                        <td>S/. {{$venta->total}}</td>
                        <td>{{$venta->fechaventa}}</td>
                        <td>@if($venta->estado)
                            <form method="post" action="{{route('ventas.destroy','test')}}">
                              {{method_field('delete')}}
                              {{csrf_field()}} 
                              <input name="id" id="id" type="hidden" value="{{$venta->id}}">
                              <button class="btn btn-danger" type="submit">Anular</button>
                            </form>
                            @else
                            <button class="btn btn-dark" type="button" disabled>Anulado</button>
                            @endif
                        </td>
                        <td>
                        <a href="{{URL::action('VentaController@show',$venta->id)}}">
                        <button type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver compra</button>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tboby>
                </table>
                
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
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
  let options = {
      numberPerPage:5,
      goBar:false, 
      pageCounter:true,
  };
  
  let filterOptions = {
      el:'#searchBox'
  };

  paginate.init('#tablaContenido',options,filterOptions);
});
</script>
<script>
@endsection