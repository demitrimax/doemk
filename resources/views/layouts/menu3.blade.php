<div class="sidebar-header">
  <div class="sidebar-title">
    Navigation
  </div>
  <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
  </div>
</div>

<div class="nano">
  <div class="nano-content">
    <nav id="menu" class="nav-main" role="navigation">
      <ul class="nav nav-main">

        <li class="{{ Request::is('home*') ? 'nav-active' : '' }}">
            <a href="{{url('home')}}" class="waves-effect"><i class="fa fa-home"></i><span> Dashboard <span class="label label-primary pull-right">1</span></span></a>
        </li>
        @can('tareas-list')
        <li class="{{ Request::is('tareas*') ? 'nav-active' : '' }}">
            <a href="{!! route('tareas.index') !!}"><i class="fa fa-check-circle"></i><span>Tareas {!! $nuevastareas->count()>0 ? '<span class="label label-primary pull-right">'.$nuevastareas->count().'</span></a>' : '' !!}</span></a>
        </li>
        @endcan
        @can('asistencia')
        <li class="{{ Request::is('asistencia*') ? 'nav-active' : '' }}">
            <a href="{!! route('asistencia') !!}"><i class="fa fa-book"></i><span>Asistencia </span></a>
        </li>
        @endcan

        @php
        if( Request::is('inventario*') || Request::is('productos*') || Request::is('categorias*')
            || Request::is('bodegas*') || Request::is('clientes*') || Request::is('invoperacions*') ) {
            $varActive = "nav-expanded nav-active";
        } else {
          $varActive = "";
        }
        @endphp
        <li class="nav-parent {{$varActive}}">
          <a>
            <i class="fa fa-cube" aria-hidden="true"></i>
            <span>Inventario</span>
          </a>
          <ul class="nav nav-children">
            @can('inventario-salida')
            <li class="nav-link {{ Request::is('inventario/salida*') ? 'nav-active' : '' }}"><a href="{!! route('inventario.salida') !!}" >Salidas</a></li>
            @endcan
            @can('inventario-entrada')
            <li class="nav-link {{ Request::is('inventario/entrada*') ? 'nav-active' : '' }}"><a href="{!! route('inventario.entrada') !!}" >Entradas</a></li>
            @endcan
            @can('invoperacions-list')
            <li class="nav-link {{ Request::is('invoperacions*') ? 'nav-active' : '' }}"><a href="{!! route('invoperacions.index') !!}" >Operación</a></li>
            @endcan

            @can('productos-list')
            <li class="{{ Request::is('productos*') ? 'nav-active' : '' }}"><a href="{{route('productos.index')}}">Productos</a></li>
            @endcan
            @can('categorias-list')
            <li class="{{ Request::is('categorias*') ? 'nav-active' : '' }}"><a href="{{route('categorias.index')}}">Categorías de Productos</a></li>
            @endcan
            @can('subcategorias-list')
            <li class="{{ Request::is('subcategorias*') ? 'nav-active' : '' }}">
                <a href="{!! route('subcategorias.index') !!}">Subcategorías de Productos</a>
            </li>
            @endcan
            @can('bodegas-list')
            <li class="{{ Request::is('bodegas*') ? 'nav-active' : '' }}"><a href="{{route('bodegas.index')}}">Bodegas</a></li>
            @endcan
            @can('clientes-list')
            <li class="{{ Request::is('clientes*') ? 'nav-active' : '' }}"><a href="{{route('clientes.index')}}">Clientes</a></li>
            @endcan
            @can('invproveedores-list')
            <li class="{{ Request::is('invproveedores*') ? 'nav-active' : '' }}"><a href="{{route('invproveedores.index')}}">Proveedores</a></li>
            @endcan

          </ul>
        </li>
        @php
        if( Request::is('catpaisdivisions*') || Request::is('catareaciudads*') || Request::is('contratistas*') ||  Request::is('docscategorias*')
                    ||  Request::is('catproductos*') ||  Request::is('documentos*') ||  Request::is('empleados*')  ) {
            $varActive = "nav-expanded nav-active";
        } else {
          $varActive = "";
        }
        @endphp
        <li class="nav-parent {{$varActive}}">
          <a>
            <i class="fa fa-hdd-o" aria-hidden="true"></i>
            <span>Catálogos</span>
          </a>
          <ul class="nav nav-children">
            @can('catpaisdivisions-list')
            <li class="{{ Request::is('catpaisdivisions*') ? 'nav-active' : '' }}"><a href="{{route('catpaisdivisions.index')}}">País División</a></li>
            @endcan
            @can('catareaciudads-list')
            <li class="{{ Request::is('catareaciudads*') ? 'nav-active' : '' }}"><a href="{{route('catareaciudads.index')}}">Área Ciudad</a></li>
            @endcan
            @can('contratistas-list')
            <li class="{{ Request::is('contratistas*') ? 'nav-active' : '' }}"><a href="{{route('contratistas.index')}}">Contratistas</a></li>
            @endcan
            @can('catproductos-list')
            <li class="{{ Request::is('catproductos*') ? 'nav-active' : '' }}"><a href="{{route('catproductos.index')}}">Productos</a></li>
            @endcan
            @can('documentos-list')
            <li class="{{ Request::is('documentos*') ? 'nav-active' : '' }}">
                <a href="{!! route('documentos.index') !!}"><span>Documentos</span></a>
            </li>
            @endcan
            @can('empleados-list')
            <li class="{{ Request::is('empleados*') ? 'nav-active' : '' }}">
                <a href="{!! route('empleados.index') !!}"><span>Empleados</span></a>
            </li>
            @endcan
            @can('docscategorias-list')
            <li class="{{ Request::is('docscategorias*') ? 'nav-active' : '' }}">
                <a href="{!! route('docscategorias.index') !!}"><span>Categorías de Documentos</span></a>
            </li>
            @endcan

          </ul>
        </li>
        @php
        if( Request::is('user*') || Request::is('roles*') || Request::is('permissions*')  ) {
            $varActive = "nav-expanded nav-active";
        } else {
          $varActive = "";
        }
        @endphp
          <li class="nav-parent {{$varActive}}">
            <a>
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <span>Configuración</span>
            </a>
            <ul class="nav nav-children">
              <li class="{{ Request::is('user*') ? 'nav-active' : '' }}"><a href="{{url('user')}}">Usuarios</a></li>
              <li class="{{ Request::is('roles*') ? 'nav-active' : '' }}"><a href="{{url('roles')}}">Roles</a></li>
              <li class="{{ Request::is('permissions*') ? 'nav-active' : '' }}"><a href="{{url('permissions')}}">Permisos</a></li>

            </ul>
          </li>


      </ul>

    </nav>


  </div>

</div>
