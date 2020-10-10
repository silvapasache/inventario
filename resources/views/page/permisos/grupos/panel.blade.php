@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_group"></i> Grupos</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-lock"></i>Permisos</li>
              <li><i class="icon_profile"></i>Grupos</li>
          </div>
        </div>

        <div class="row">  
              
        <div class="col-lg-4">
            <section class="panel">
              <header class="panel-heading">""</header>
              <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>descripcion</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->rol}}</td>
                            <td>{{$rol->descripcion}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success" href="#" >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>    
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </section>
        </div>

        </div>
      </section>
</section>
@endsection
@section('scripts')
  @include('page.permisos.grupos.script')
@endsection