<table class="table">
  <thead>
    <tr>
      <th>Operación ID</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Monto</th>
      <th>Fecha</th>
    </tr>
  </thead>

  <tbody>
    @foreach($clientes->invoperacion as $key=>$operacion)



      @foreach($operacion->invdetoperacions as $detalle)
      <tr>
        <td>{!! $operacion->id !!}</td>
        <td>{!! $detalle->producto->nombre!!}</td>
        <td>{!! $detalle->cantidad!!}</td>
        <td>${!! number_format($detalle->importe * 1.16, 2) !!}</td>
        <td>{!! $operacion->fecha->format('d-m-Y') !!}</td>
      </tr>
      @endforeach
    <tr>
      <th colspan="3">Total</th>
      <th colspan="2"> ${!! number_format($operacion->total,2) !!} </th>
    </tr>

    @endforeach
    <tr>
      <th colspan="3">Total</th>
      <th colspan="2"> ${!! number_format($clientes->invoperacion->sum('total'),2) !!} </th>
    </tr>

  </tbody>
</table>
