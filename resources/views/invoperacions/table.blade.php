<div class="table-responsive">
<table class="table table-responsive" id="invoperacions-table">
    <thead>
        <tr>
            <th>Folio</th>
            <th>PROVEEDOR/CLIENTE</th>
            <th>No. de Factura</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($invoperacions as $invoperacion)
        <tr>

            <td><a href="{!! route('invoperacions.show', [$invoperacion->id]) !!}"> {!! $invoperacion->folio !!}</a>
              {!! $invoperacion->tipo_mov == 'Entrada' ? '<i class="text-primary fas fa-arrow-alt-circle-down"></i>' : '<i class="text-success fas fa-arrow-alt-circle-up"></i>' !!}</td>
            <td>{!! $invoperacion->personanombre !!}</td>
            <td>{!! $invoperacion->numfactura !!}</td>
            <td>{!! number_format($invoperacion->total,2) !!}</td>
            <td>{!! $invoperacion->fecha->format('d-m-Y') !!}</td>
            <td><span class="label label-{{$invoperacion->estatush['label']}}"> {!! $invoperacion->estatush['estado'] !!}</span></td>
            <td>
                {!! Form::open(['route' => ['invoperacions.destroy', $invoperacion->id], 'method' => 'delete', 'id'=>'form'.$invoperacion->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('invoperacions.show', [$invoperacion->id]) !!}" class='btn btn-info'><i class="fa fa-eye"></i></a>
                    @can('invoperacions-edit0')
                    <a href="{!! route('invoperacions.edit', [$invoperacion->id]) !!}" class='btn btn-primary'><i class="fa fa-pencil"></i></a>
                    @endcan
                    @can('invoperacions-delete')
                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($invoperacion->id)"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('scripts')
<script>
function ConfirmDelete(id) {
  swal.fire({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar este elemento.',
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
</script>
@endsection
