<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedors = Proveedor::paginate(5);
        return view('proveedors.index', compact('proveedors'));
    }

    public function create()
    {
        return view('proveedors.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'telefono' => 'nullable',
            'direccion' => 'nullable'
        ]);
        Proveedor::create($validated);
        return to_route('proveedors.index')->with('message', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedors.edit', compact('proveedor'));
    }


    public function update(Request $request, Proveedor $proveedor)
    {
        
        $validated = $request->validate([
            'nombre' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable'
        ]);
        $proveedor->update($validated);

        return to_route('proveedors.index')->with('message', 'proveedor actualisado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        try{
            $proveedor->delete();
            return to_route('proveedors.index')->with('message', 'Proveedor eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este proveedor no se puede eliminar.');
        }
    }
}
