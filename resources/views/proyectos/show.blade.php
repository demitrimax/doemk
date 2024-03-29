@extends('layouts.app')
@section('title',config('app.name').' | Proyecto '.$proyectos->nombre )
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
      <h3 class="panel-title">Proyectos</h3>
  </div>

          <div class="row">

            <div class="col-md-6">
              <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered detail-view" id="proyectos-table">
                    <tbody>
                      @include('proyectos.show_fields')
                      </tbody>
                    </table>
                      {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete', 'id'=>'form'.$proyectos->id]) !!}
                      <a href="{!! url()->previous() !!}" class="btn btn-default">Regresar</a>
                      @can('proyectos-edit')
                      <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class="btn btn-primary">Editar</a>
                      @endcan
                      @can('proyectos-terminar')
                        @if($proyectos->estatus_id == 'A')
                        <button onclick="ConfirmTerminar()" title="Terminar Proyecto" type="button" class="btn waves-effect btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terminar el Proyecto actual"> <i class="ion ion-checkmark-round"></i> </button>
                        @endif
                      @endcan
                      @can('proyectos-delete')
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($proyectos->id)", 'data-original-title'=>'Eliminar Proyecto', 'data-toggle'=>'tooltip', 'data-placement'=>'top' ]) !!}
                      @endcan
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>

          <div class="col-md-6">
            <div class="panel-body">
              @can('documentos-list')
                  @php

                  function human_filesize($bytes, $decimals = 2) {
                    $sz = 'BKMGTP';
                    $factor = floor((strlen($bytes) - 1) / 3);
                    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
                  }

                  @endphp
                <div class="table-responsive">
                  @if($proyectos->documentos->count()>0)
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Documento</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($proyectos->documentos as $key=>$documento)
                    <tr>
                        <td><span class="badge" style="background-color:{!! $documento->categoria->color!!}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{!! $documento->categoria->nombre!!}"><i class="{!!$documento->categoria->icono !!}"></i></span></td>
                        <td>
                          <a href="{{url('verdoc/'.$documento->id)}}">{{$documento->nombre_doc}}</a>
                          @if (file_exists(storage_path('app/'.$documento->file_servidor)) )
                          ( {{ human_filesize(filesize(storage_path('app/'.$documento->file_servidor))) }}bytes)
                          @endif

                        </td>
                        <td>{{$documento->descripcion}}</td>
                        <td>

                          {!! Form::open(['route' => ['documentos.destroy', $documento->id], 'method' => 'delete', 'id'=>'formDoc'.$documento->id]) !!}
                          <div class='btn-group'>
                            @can('documentos-delete')
                              {!! Form::hidden('proyectoid', $proyectos->id)!!}
                              {!! Form::hidden('redirect', 'proyectos.show')!!}
                              <button type="button" class="btn waves-effect btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" onclick = "ConfirmDeleteDoc({{$documento->id}})"> <i class="fa fa-times"></i> </button>
                            @endcan
                          </div>
                          {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                No existen documentos para el proyecto.
                @endif
                </div>
                @endcan
                @can('documentos-create')

                  <button title="Agregar Documento" type="button" class="btn waves-effect btn-primary" data-toggle="modal" data-target="#addDoc"> <i class="ion ion-document-text"></i> Agregar Documento</button>

                @endcan
            </div>

        </div>


        </div>

    </div>
    @can('documentos-create')
    <div id="addDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              {!! Form::open(['route' => 'documentos.store', 'enctype' => 'multipart/form-data']) !!}
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Documento al proyecto</h4>
              </div>
              <div class="modal-body">
                  {!! Form::hidden('redirect', 'proyectos.show')!!}
                  {!! Form::hidden('proyecto_id', $proyectos->id)!!}
                  <!-- Nombre Doc Field -->
                  <div class="form-group">
                      {!! Form::label('nombre_doc', 'Documento:') !!}
                      {!! Form::file('nombre_doc', ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('categoria_id', 'Categoria Documento:') !!}
                      {!! Form::select('categoria_id', $categoriasdocs, null, ['class' => 'form-control', 'placeholder'=>'Seleccione una categoría']) !!}
                  </div>

                  <!-- Descripcion Field -->
                  <div class="form-group">
                      {!! Form::label('descripcion', 'Descripcion o Comentario:') !!}
                      {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                  </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
              </div>
              {!! Form::close() !!}
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  @endcan
@endsection

@section('scripts')
<script>
function ConfirmTerminar() {
  swal.fire({
        title: '¿Estás seguro?',
        text: 'El proyecto cambiará de Estatus a TERMINADO.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    window.location.href = '{{url('proyecto/'.$proyectos->id.'/terminar')}}';
    //document.forms['form'+id].submit();
  }
})
}
function ConfirmDelete(id) {
  swal.fire({
        title: 'ELIMINAR PROYECTO',
        text: 'El proyecto actual será eliminado.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['form'+id].submit();
  }
})
}
function ConfirmDeleteDoc(id) {
  swal.fire({
        title: 'Eliminar Documento',
        text: 'Se eliminará el documento.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['formDoc'+id].submit();
  }
})
}
</script>
@endsection
