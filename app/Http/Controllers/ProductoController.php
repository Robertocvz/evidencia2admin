<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(6);
        return view('producto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosproducto=request()->except('_token');

        if($request->hasFile('Foto'))
        {
            $datosproducto['Foto']=$request->file('Foto')->store('uploads','public');
        }
        producto::insert($datosproducto);
        return response()->json($datosproducto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto=producto::findOrFail($id);
        return view('producto/edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosproducto=request()->except('_token','_method');
        if($request->hasFile('Foto'))
        {
            $producto=producto::findOrFail($id);
            Storage::delete('public/'.$producto->Foto);
            $datosproducto['Foto']=$request->file('Foto')->store('uploads','public');
        }

        producto::where('id','=',$id)->update($datosproducto);

        $producto=producto::findOrFail($id);
        return view('producto/edit', compact('producto'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto=producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->Foto))
        {
            producto::destroy($id);

            
        }
     
        return redirect('producto');

    }
}
