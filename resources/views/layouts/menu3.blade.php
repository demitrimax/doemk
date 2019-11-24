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
            <a href="{{url('home')}}" class="waves-effect"><i class="fa fa-home"></i><span> Dashboard <span class="badge badge-primary pull-right">1</span></span></a>
        </li>
        @can('tareas-list')
        <li class="{{ Request::is('tareas*') ? 'nav-active' : '' }}">
            <a href="{!! route('tareas.index') !!}"><i class="fa fa-check-circle"></i><span>Tareas {!! $nuevastareas->count()>0 ? '<span class="badge badge-primary pull-right">'.$nuevastareas->count().'</span></a>' : '' !!}</span></a>
        </li>
        @endcan
        @can('asistencia')
        <li class="{{ Request::is('asistencia*') ? 'nav-active' : '' }}">
            <a href="{!! route('asistencia') !!}"><i class="fa fa-book"></i><span>Asistencia </span></a>
        </li>
        @endcan

        @php
        if( Request::is('inventario*') || Request::is('productos*') || Request::is('categorias*')
            || Request::is('bodegas*') || Request::is('clientes*') ) {
            $varActive = "active";
        } else {
          $varActive = "";
        }
        @endphp
        <li class="nav-parent">
          <a>
            <i class="fa fa-cube" aria-hidden="true"></i>
            <span>Inventario</span>
          </a>
          <ul class="nav nav-children">
            @can('inventario-salida')
            <li class="nav-item"><a href="{!! route('inventario.salida') !!}" class="nav-link {{ Request::is('inventario/salida*') ? 'active' : '' }}">Salidas</a></li>
            @endcan
            @can('inventario-entrada')
            <li class="nav-item"><a href="{!! route('inventario.entrada') !!}" class="nav-link {{ Request::is('inventario/entrada*') ? 'active' : '' }}">Entradas</a></li>
            @endcan
            @can('invoperacions-list')
            <li class="nav-item"><a href="{!! route('invoperacions.index') !!}" class="nav-link {{ Request::is('invoperacions*') ? 'active' : '' }}">Operación</a></li>
            @endcan

            @can('productos-list')
            <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{{route('productos.index')}}">Productos</a></li>
            @endcan
            @can('categorias-list')
            <li class="{{ Request::is('categorias*') ? 'active' : '' }}"><a href="{{route('categorias.index')}}">Categorías de Productos</a></li>
            @endcan
            @can('subcategorias-list')
            <li class="{{ Request::is('subcategorias*') ? 'active' : '' }}">
                <a href="{!! route('subcategorias.index') !!}">Subcategorías de Productos</a>
            </li>
            @endcan
            @can('bodegas-list')
            <li class="{{ Request::is('bodegas*') ? 'active' : '' }}"><a href="{{route('bodegas.index')}}">Bodegas</a></li>
            @endcan
            @can('clientes-list')
            <li class="{{ Request::is('clientes*') ? 'active' : '' }}"><a href="{{route('clientes.index')}}">Clientes</a></li>
            @endcan
            @can('invproveedores-list')
            <li class="{{ Request::is('invproveedores*') ? 'active' : '' }}"><a href="{{route('invproveedores.index')}}">Proveedores</a></li>
            @endcan

          </ul>
        </li>
        <li class="nav-parent">
          <a>
            <i class="fa fa-hdd-o" aria-hidden="true"></i>
            <span>Catálogos</span>
          </a>
          <ul class="nav nav-children">
            @can('catpaisdivisions-list')
            <li class="{{ Request::is('catpaisdivisions*') ? 'active' : '' }}"><a href="{{route('catpaisdivisions.index')}}">País División</a></li>
            @endcan
            @can('catareaciudads-list')
            <li class="{{ Request::is('catareaciudads*') ? 'active' : '' }}"><a href="{{route('catareaciudads.index')}}">Área Ciudad</a></li>
            @endcan
            @can('contratistas-list')
            <li class="{{ Request::is('contratistas*') ? 'active' : '' }}"><a href="{{route('contratistas.index')}}">Contratistas</a></li>
            @endcan
            @can('catproductos-list')
            <li class="{{ Request::is('catproductos*') ? 'active' : '' }}"><a href="{{route('catproductos.index')}}">Productos</a></li>
            @endcan
            @can('documentos-list')
            <li class="{{ Request::is('documentos*') ? 'active' : '' }}">
                <a href="{!! route('documentos.index') !!}"><span>Documentos</span></a>
            </li>
            @endcan
            @can('empleados-list')
            <li class="{{ Request::is('empleados*') ? 'active' : '' }}">
                <a href="{!! route('empleados.index') !!}"><span>Empleados</span></a>
            </li>
            @endcan
            @can('docscategorias-list')
            <li class="{{ Request::is('docscategorias*') ? 'active' : '' }}">
                <a href="{!! route('docscategorias.index') !!}"><span>Categorías de Documentos</span></a>
            </li>
            @endcan

          </ul>
        </li>

          <li class="nav-parent">
            <a>
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <span>Configuración</span>
            </a>
            <ul class="nav nav-children">
              <li class="{{ Request::is('user*') ? 'active' : '' }}"><a href="{{url('user')}}">Usuarios</a></li>
              <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{url('roles')}}">Roles</a></li>
              <li class="{{ Request::is('permissions*') ? 'active' : '' }}"><a href="{{url('permissions')}}">Permisos</a></li>

            </ul>
          </li>


      </ul>

    </nav>


  </div>

</div>
