@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-star"></i> Productos</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-star"></i>Productos</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-12">
           </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <header class="panel-heading">Listado de productos</header>
              <div class="cotenido" style="padding:5px;">
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#agregar">
              <i class="fa fa-plus"></i>
                Agregar</button></div>
            </section>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
           </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <div class="table-responsive" >
              
              <table class="table">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>Estado</th>
                          <th>Imagen</th>
                          <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->categoria}}  </td>
                            <td>{{$producto->stock}}</td>
                            <td>
                              @if($producto->estado==1) <span class="text-success" style="border:solid 1px;border-radius: 4px;padding:2px;">Habilitado</span> 
                              @else <span class="text-danger" style="border:solid 1px;border-radius: 4px;padding:2px;">Inabilitado</span>
                              @endif
                            </td>
                            <td><img src="{{asset('storage/img/productos/'.$producto->imagen)}}" width="50px" heigth="50px"></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary"  href="{{URL::action('KardexController@show',$producto->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#editar" 
                                    data-id         ="{{$producto->id}}"
                                    data-nombre     ="{{$producto->nombre}}"
                                    data-stock      ="{{$producto->stock}}"
                                    data-categoria  ="{{$producto->categoria_id}}"
                                    data-estado     ="{{$producto->estado}}"
                                    
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="{{url('/producto')}}/{{$producto->id}}"
                                      onclick="event.preventDefault();
                                      document.getElementById('delete-form-{{$producto->id}}').submit();" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <form id="delete-form-{{$producto->id}}" method="post" action="{{url('/producto')}}/{{$producto->id}}">
                                      {{csrf_field()}}
                                      {{method_field('DELETE') }}
                                    </form>
                                </div>    
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$productos->render()}}
              </div>
            </section>
          </div>
        </div>
        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>
<!--STAR MODAL --> 

<form method="post" action="{{url('producto') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    @include('page.producto.form')
  </div>
</form>

<form method="post" action="{{route('producto.update','test') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  {{method_field('PUT') }}
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   @include('page.producto.form')
  </div>
</form>
<!--END MODAL -->
@endsection
@section('scripts')
@include('page.producto.script')
@endsection