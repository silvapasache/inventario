@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-star"></i> Clientes</h3>
            
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-star"></i>clientes</li>
            </ol>
          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-12">
           </div>
          <div class="col-lg-12">
            <section class="panel" style="">
              <header class="panel-heading">Listado de Clientes</header>
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
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->tipo_documento}}  </td>
                            <td>{{$cliente->numero}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->direccion}}</td>
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
                                    <a class="btn btn-danger" href="{{url('/clientes')}}/{{$cliente->id}}"
                                      onclick="event.preventDefault();
                                      document.getElementById('delete-form-{{$cliente->id}}').submit();" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <form id="delete-form-{{$cliente->id}}" method="post" action="{{url('/clientes')}}/{{$cliente->id}}">
                                      {{csrf_field()}}
                                      {{method_field('DELETE') }}
                                    </form>
                                </div>    
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$clientes->render()}}
              </div>
            </section>
          </div>
        </div>
        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>
<!--STAR MODAL --> 

<form method="post" action="{{route('clientes.store') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     @include('page.clientes.form')
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

  @if ($errors->has('email') or $errors->has('numero'))
  <script type="text/javascript">
  $("#agregar").modal("show");
  </script>
  @endif

@endsection