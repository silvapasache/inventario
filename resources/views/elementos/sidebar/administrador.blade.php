<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="{{route('desboard')}}">
                          <i class="icon_house_alt"></i>
                          <span>Desboard</span>
                      </a>
          </li>
          <li class="">
            <a href="{{route('clientes.index')}}" class="">
                          <i class="icon_document_alt"></i>
                          <span>Cliente</span>
            </a>

          </li>
          <li class="">
            <a href="{{route('proveedores.index')}}" class="">
                          <i class="icon_desktop"></i>
                          <span>Proveedor</span>
            </a>
          </li>

          <li class="">
            <a class="" href="{{url('/compra')}}">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Compras</span>
            </a>
          </li>

        <li class="">
          <a class="" href="{{route('ventas.index')}}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Ventas</span>
          </a>
        </li>

          <li class="">
            <a class="" href="{{url('/producto')}}">
                          <i class="fa fa-star"></i>
                          <span>Productos</span>
            </a>
          </li>

          <li class="sub-menu">
            <a class="" href="javascript:;">
                          <i class="fa fa-lock"></i>
                          <span>Permisos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul  class="sub">
              <li><a class="" href="{{url('/usuario')}}">Usuarios</a></li>
              <li><a class="" href="{{url('/grupos')}}">Grupos</a></li>
              <li><a class="" href="grids.html">Permisos</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>RRHH</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>