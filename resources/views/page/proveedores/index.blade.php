@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-star"></i> proveedores</h3>
            
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-star"></i>proveedores</li>
            </ol>
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
                          <th>Tipo Documento</th>
                          <th>Numero</th>
                          <th>telefono</th>
                          <th>email</th>
                          <th>direccion</th>
                          <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->id}}</td>
                            <td>{{$proveedor->nombre}}</td>
                            <td>{{$proveedor->tipo_documento}}  </td>
                            <td>{{$proveedor->numero}}</td>
                            <td>{{$proveedor->telefono}}</td>
                            <td>{{$proveedor->email}}</td>
                            <td>{{$proveedor->direccion}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#editar" 
                                    data-id         =""
                                    data-nombre     =""
                                    data-stock      =""
                                    data-categoria  =""
                                    data-estado     =""
                                    
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="{{url('/producto')}}/{{$proveedor->id}}"
                                      onclick="event.preventDefault();
                                      document.getElementById('delete-form-{{$proveedor->id}}').submit();" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <form id="delete-form-{{$proveedor->id}}" method="post" action="{{url('/producto')}}/{{$proveedor->id}}">
                                      {{csrf_field()}}
                                      {{method_field('DELETE') }}
                                    </form>
                                </div>    
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$proveedores->render()}}
              </div>
            </section>
          </div>
        </div>
        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>
<!--STAR MODAL --> 

<form method="post" action="{{route('proveedores.store') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   @include('page.proveedores.form')
  </div>
</form>

<form method="post" action="{{route('producto.update','test') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  {{method_field('PUT') }}
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
  </div>
</form>
<!--END MODAL -->
@endsection
@section('scripts')

@endsection