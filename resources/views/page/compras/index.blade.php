@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-shopping-cart"></i> Compras</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-shopping-cart"></i>Compras</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-12">
          </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <header class="panel-heading">Listado de productos</header>
              <div class="row" style="padding:5px;">
              <form class="navbar-form">
                <input id="searchBox" class="form-control" placeholder="Search" type="text">
              </form>
                <a href="{{url('compra/create')}}" class="btn btn-danger"><i class="fa fa-plus"></i>Agregar</a>
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
                          <th>resposable</th>
                          <th>proveedor</th>
                          <th>Total</th>
                          <th>fecha de emision</th>
                          <th>Estado</th>
                          <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($compras as $compra)
                    <tr>
                        <td>{{$compra->id}}</td>
                        <td>Factura</td>
                        <td>{{$compra->numcompra}}</td>
                        <td>{{$compra->usuario}}</td>
                        <td>{{$compra->proveedor}}</td>
                        <td>S/. {{$compra->total}}</td>
                        <td>{{$compra->created_at}}</td>
                        <td>@if($compra->estado)
                            <form method="post" action="{{route('compra.destroy','test')}}">
                              {{method_field('delete')}}
                              {{csrf_field()}} 
                              <input name="id" id="id" type="hidden" value="{{$compra->id}}">
                              <button class="btn btn-danger" type="submit">Anular</button>
                            </form>
                            @else
                            <button class="btn btn-dark" type="button" disabled>Anulado</button>
                            @endif
                        </td>
                        <td>
                        <a href="{{URL::action('CompraController@show',''.$compra->id)}}">
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

@endsection