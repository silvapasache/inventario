@extends('mascara')
@section('contenido')
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-star"></i> Productos</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="/desboard">Home</a></li>
              <li><i class="fa fa-star"></i><a href="/producto">Productos</a></li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        
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
                          <th>Fecha</th>
                          <th>Evento</th>
                          <th>Numero</th>
                          <th>Entrada</th>
                          <th>Salida</th>
                          <th>Resto</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $resto=0;
                        @endphp
                        @foreach($kardexes as $kardex)
                        <tr>
                            <td></td>
                            <td>{{$kardex->created_at}}</td>
                            <td>{{$kardex->codigodocumento}}</td>
                            <td>{{$kardex->numerodocumento}}</td>
                            @if($kardex->codigodocumento=='DOCCO01')
                            <td>{{$kardex->cantidad}}</td>
                            <td></td>
                            @php
                                $resto=$resto+$kardex->cantidad;
                            @endphp
                            @else
                            <td></td>
                            <td>{{$kardex->cantidad}}</td>
                            @php
                                $resto=$resto-$kardex->cantidad;
                            @endphp
                            @endif
                            <td>{{$resto}}</td>
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

<!--END MODAL -->
@endsection