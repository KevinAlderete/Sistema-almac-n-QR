<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required', 
            'genero' => 'nullable', 
            'dni' => 'required', 
            'cargo' => 'nullable',
            'email' => 'nullable', 
            'telefono' => 'nullable',
            'direccion' => 'nullable'
        ]);
        $validated['uuid'] = (string) Str::orderedUuid();
        Empleado::create($validated);
        return to_route('empleados.index')->with('message', 'Empleado registrado correctamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.empleado', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }


    public function update(Request $request, Empleado $empleado)
    {
        
        $validated = $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required', 
            'genero' => 'nullable', 
            'dni' => 'required', 
            'cargo' => 'nullable',
            'email' => 'nullable', 
            'telefono' => 'nullable',
            'direccion' => 'nullable'
        ]);
        $empleado->update($validated);

        return to_route('empleados.index')->with('message', 'Empleado actualisado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        try{
            $empleado->delete();
            return to_route('empleados.index')->with('message', 'Empleado eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este empleado no se puede eliminar.');
        }
    }

    public function carnet(Empleado $empleado)
    {
        $pdf = Pdf::loadView('empleados.carnet', compact('empleado'));
        return $pdf->stream('empleadoCarnet.pdf');
    }
}
