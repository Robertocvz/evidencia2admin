@extends('layouts.app')

@section('content')
<div class="container">
<a > Tabla de pedidos</a>
<br/>
<br/>
<a href="{{url('/producto/')}}" class="btn btn-primary"  > Ver los productos</a>
<br/>
<br/>
    <table class="table table-primary">
        <thead>
            <tr>
                <th>#</th>
                <th>Id Pedido</th>
                <th>Id Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Estatus del pedido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido) 
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->idPedido}}</td>
                <td>{{$pedido->idProducto}}</td>
                <td>{{$pedido->Cantidad}}</td>
                <td>{{$pedido->PrecioUnitario}}</td>
                <td>{{$pedido->PrecioTotal}}</td>
                <td>{{$pedido->Estatus}}</td>
                <td>
                    <a href="{{url('/pedido/'.$pedido->id.'/edit')}}" class="btn btn-warning">editar</a>
                    <form action="{{url('/pedido/'.$pedido->id)}}" class="d-inline" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <a href="{{url('/pedido/create')}}" class="btn btn-success" class="d-inline">Agregar nuevo pedido</a>
</div>
@endsection