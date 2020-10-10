@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_group"></i> Usuarios</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-lock"></i>Permisos</li>
              <li><i class="icon_profile"></i>Usuarios</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-12">
            <div class="row"> 
            <form class="navbar-form">
              <input id="buscar" class="form-control" placeholder="Search" type="text">
            </form>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + | Agregar</button>
         
            </div>
         </div>
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">""</header>
              <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>ROL</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tablaContenido">
                  @foreach($usuarios as $usuario)
                  <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->usuario}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->dni}}</td>
                    <td>{{$usuario->rol}}</td>
                    <td><img src="{{asset('storage/img/user/'.$usuario->imagen)}}" with="30px" height="30px" /></td>
                    <td>
                      @if($usuario->estado==1) <span class="text-success" style="border:solid 1px;border-radius: 4px;padding:2px;">Activo</span> 
                      @else <span class="text-danger" style="border:solid 1px;border-radius: 4px;padding:2px;">Inactivo</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#" >
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-success"  href="#" data-toggle="modal" data-target="#editar"
                          data-id			  ="{{$usuario->id}}" 
                          data-nombre 	="{{$usuario->nombre}}" 
                          data-email		="{{$usuario->email}}"
                          data-dni    	="{{$usuario->dni}}" 
                          data-telefono	="{{$usuario->telefono}}"
                          data-direccion="{{$usuario->direccion}}" 
                          data-usuario  ="{{$usuario->usuario}}"
                          data-imagen		="{{$usuario->imagen}}" 
                          data-password	="{{$usuario->password}}"
                          data-idrol	  	="{{$usuario->idrol}}"  
                          data-estado		="{{$usuario->estado}}"
                          >
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-danger" href="{{url('/usuario/')}}/{{$usuario->id}}"
                            onclick="event.preventDefault();
                            document.getElementById('delete-form-{{$usuario->id}}').submit();">
                          <i class="fa fa-trash-o"></i> 
                        </a>
                          <form id="delete-form-{{$usuario->id}}" action="{{url('/usuario/')}}/{{$usuario->id}}" method="POST" style="display: none;">
                          {{csrf_field()}}
				                  {{method_field('DELETE') }}
                          </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
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
<form method="post" action="{{url('usuario') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    @include('page.permisos.usuarios.form')
  </div>
</form>

<form method="post" action="{{route('usuario.update','test') }}" enctype="multipart/form-data">
  {{csrf_field()}} 
  {{method_field('PUT') }}
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    @include('page.permisos.usuarios.form')
  </div>
</form>
<!--END MODAL -->
@endsection
@section('scripts')
  @include('page.permisos.usuarios.script')
  @if($errors->has('email') or  $errors->has('usuario') or $errors->has('password'))
  <script type="text/javascript">
    $("#agregar").modal("show");
  </script>
  @endif
  <script>

    $("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaContenido tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

  </script>
@endsection