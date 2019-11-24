@extends('layouts.app3')
@section('title',config('app.name').' | Subcategorias' )
@section('content')
    <section class="content-header">
        <h1>
            Subcategorias
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="subcategorias-table">
                  <tbody>
                    @include('subcategorias.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('subcategorias.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
