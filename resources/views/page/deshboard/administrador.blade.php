<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_genius"></i> Desboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_genius"></i>Widgets</li>

          </div>
        </div>
        
        <!--CONTENIDO-->
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-calendar-o"></i>
              <div class="count">S/.{{number_format($ventas->venta_total,2)}}</div>
              <div class="title">Ventas</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box red-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">S/.{{number_format($compras->compra_total,2)}}</div>
              <div class="title">Compras</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-money"></i>
              <div class="count">S/.{{number_format($ventas->venta_total-$compras->compra_total,2)}}</div>
              <div class="title">Utilidades</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">{{$producto->stock_total}}</div>
              <div class="title">Inventario</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        
        <div>
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading"><h3>Resumen</h3></header>
              <div class="panel-body">
              <canvas id="bar" height="300" width="500" style="width: 500px; height: 300px;"></canvas>
              </div>
            </section>
          </div>
        </div>
        <!--/.row-->
        

        <!--END-CONTENIDO-->
        <!-- page end-->
      </section>
</section>