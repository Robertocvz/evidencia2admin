@extends('layouts.app')

@section('content')
<div class="container">
<a > Tabla de Productos</a>
<br/>
<br/>
<a href="{{url('/pedido/')}}" class="btn btn-primary" > Ver los pedidos</a>
</form>
<br/>
<br/>
    <table class="table table-primary">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio Unitario</th>
                <th>Cantidad de stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto) 
            <tr>
             <td>{{$producto->id}}</td>
             <td>
                <img class="img-thumbnail img-fliud" width="50px" height="50x" src="{{asset('storage/app/public/'.$producto->Foto)}}"/>
             {{$producto->Foto}}


            </td>
             <td>{{$producto->idProducto}}</td>
             <td>{{$producto->Nombre}}</td>
             <td>{{$producto->Descripcion}}</td>
             <td>{{$producto->PrecioUnitario}}</td>
             <td>{{$producto->Cantidad}}</td>
             <td>

             <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning"> editar</a>
                
             <form action="{{url('/producto/'.$producto->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input class="btn btn-danger" type="submit"  onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
             
              </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <a href="{{url('/producto/create')}}" class="btn btn-success" > Agregar nuevo producto</a>
</div>
@endsection