@extends('layouts.app3')
@section('title',config('app.name').' | Clientes' )
@section('content')
    <div class="content">
        <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Clientes</h3>
        </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    @include('clientes.show_fields')
                  </div>

                  <div class="col-md-6">
                    @include('clientes.misoperaciones')
                  </div>

                </div>
                <a href="{!! route('clientes.index') !!}" class="btn btn-default">Regresar</a>
            </div>
        </div>
    </div>
@endsection
