<div class="form-group">
<label for="idProducto">Id del producto</label>
    <input type="text" class="form-control" name="idProducto" value="{{isset($producto->idProducto)?$producto->idProducto:' '}}" id="idProducto"> 
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text"  class="form-control" name="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:' '}}"id="Nombre"> 
    </div>
    <div class="form-group">
    <label for="Descripcion">Descripcion</label>
    <input type="text"  class="form-control" name="Descripcion" value="{{isset($producto->Descripcion)?$producto->Descripcion:' '}}"id="Descripcion"> 
    </div>
    <div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($producto->Foto))
    <img class="img-thumbnail img-fliud" width="50px" height="50x" src="{{asset('storage'.'/'.$producto->Foto)}}"/>
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto"> 
    </div>
    <div class="form-group">
<label for="Precio">Precio Unitario</label>
    <input type="text" class="form-control" name="PrecioUnitario" value="{{isset($producto->PrecioUnitario)?$producto->PrecioUnitario:' '}}" id="PrecioUnitario"> 
    <br>
</div>
<div class="form-group">
<label for="Cantidad">Cantidad</label>
    <input type="text" class="form-control" name="Cantidad" value="{{isset($producto->Cantidad)?$producto->Cantidad:' '}}" id="Cantidad"> 
    <br>
</div>
    <br>
    <input class="btn btn-success" type="submit" value="Guardar datos"> 

    <a class="btn btn-primary" href="{{url('/producto/')}}"> REGRESAR </a>
    <br>