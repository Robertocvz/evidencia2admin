<div class="form-group">
<label for="idPedido">Pedido</label>
    <input type="text"  class="form-control" name="idPedido" value="{{isset($pedido->idPedido)?$pedido->idPedido:' '}}"id="idPedido"> 
    </div>

    <div class="form-group">
    {{ Form::label('idProducto', 'ID Producto') }}
    {{ Form::select('idProducto', $productos, isset($pedido->idProducto) ? $pedido->idProducto : null, ['class' => 'form-select' . ($errors->has('idProducto') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el id del producto']) }}
    {!! $errors->first('idProducto', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="Cantidad">Cantidad</label>
    <input type="text"  class="form-control" name="Cantidad" value="{{isset($pedido->Cantidad)?$pedido->Cantidad:' '}}"id="Cantidad"> 
    </div>

    <div class="form-group">
    {{ Form::label('PrecioUnitario', 'Precio Unitario') }}
    {{ Form::select('PrecioUnitario', $preciounitario, isset($pedido->PrecioUnitario) ? $pedido->PrecioUnitario : null, ['class' => 'form-select' . ($errors->has('PrecioUnitario') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el precio unitario']) }}
    {!! $errors->first('PrecioUnitario', '<div class="invalid-feedback">:message</div>') !!}
</div>

    <div class="form-group">
<label for="PrecioTotal">Precio Total</label>
    <input type="text" class="form-control" name="PrecioTotal" value="{{isset($pedido->PrecioTotal)?$pedido->PrecioTotal:' '}}" id="PrecioTotal"> 
    <br>
</div>
<div class="form-group">
<label for="Estatus">Estatus</label>
    <input type="text" class="form-control" name="Estatus" value="{{isset($pedido->Estatus)?$pedido->Estatus:' '}}" id="Estatus"> 
    <br>
</div>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar datos"> 

    <a class="btn btn-primary" href="{{url('/pedido/')}}"> REGRESAR </a>
    <br>