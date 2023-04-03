<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['pedidos']=pedido::paginate(6);
        return view('pedido.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::pluck('idProducto');
        $preciounitario = Producto::pluck('PrecioUnitario');
        return view('pedido.create', compact('productos','preciounitario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datospedido=request()->except('_token');
        pedido::insert($datospedido);
        return response()->json($datospedido);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pedido=pedido::findOrFail($id);
        $productos = producto::pluck('idProducto','PrecioUnitario');
        $preciounitario = Producto::pluck('PrecioUnitario');
        return view('pedido/edit', compact('pedido','productos','preciounitario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datospedido=request()->except('_token','_method');
        pedido::where('id','=',$id)->update($datospedido);

        $pedido=pedido::findOrFail($id);
        return view('pedido/edit', compact('pedido'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido=pedido::findOrFail($id);
     
        return redirect('pedido');

    }
}
