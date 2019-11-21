@extends('layouts.app')
@section('title',config('app.name').' | Editar Subcategorias' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Subcategorias</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($subcategorias, ['route' => ['subcategorias.update', $subcategorias->id], 'method' => 'patch']) !!}

                   @include('subcategorias.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
