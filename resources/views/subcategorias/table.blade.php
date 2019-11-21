<table class="table table-responsive" id="subcategorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subcategorias as $subcategorias)
        <tr>
            <td>{!! $subcategorias->nombre !!}</td>
            <td>{!! $subcategorias->categoria->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['subcategorias.destroy', $subcategorias->id], 'method' => 'delete', 'id'=>'form'.$subcategorias->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('subcategorias.show', [$subcategorias->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('subcategorias-edit')
                    <a href="{!! route('subcategorias.edit', [$subcategorias->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('subcategorias-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "ConfirmDelete($subcategorias->id)"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

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
