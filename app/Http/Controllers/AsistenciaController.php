<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Empleado;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $empleado = Empleado::all();
        return view('asistencias.index', compact('empleado'));
    }

    public function create()
    {
        return view('asistencias.index');
    }


    public function store(Request $request, Empleado $empleados)
    {
        $empleados = Empleado::all();
        $validated = $request->validate([
            'idEmpleado' => 'required'
        ]);

        foreach ($empleados as $empleado) {
            if($request['idEmpleado'] == $empleado->uuid){ 
                Asistencia::create($validated);
                return to_route('asistencias.index', compact('empleado'))->with('messageAsistencia', 'Asistencia registrada correctamente.');
            }
        }

        return to_route('asistencias.index', compact('empleado'))->with('messageAlertAsistencia', 'Empleado no encontrado.');
        
        
    }
}
