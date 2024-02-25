<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Asistencia;
use App\Models\Categoria;
use App\Models\Empleado;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ReporteController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        $asistencias = Asistencia::all();
        $articulos = Articulo::all();
        $categorias = Categoria::all();
        $ventas = Venta::search(Request('search'))->paginate(5);
         
        return view('reporte.index', compact('empleados', 'asistencias', 'categorias', 'ventas', 'articulos'));
    }

    public function destroy(Asistencia $asistencia)
    {
        try{
            $asistencia->delete();
            return to_route('reporte.index')->with('message', 'Venta eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Esta venta no se puede eliminar.');
        }
    }

    public function boletaPDF(Categoria $categorias, Articulo $articulos, Venta $venta)
    {
        $articulos = Articulo::all();
        $categorias = Categoria::all();
        $pdf = Pdf::loadView('reporte.boletaPDF', compact('categorias', 'articulos', 'venta'));
        return $pdf->stream('boletaPDF.pdf');
    }

    

   
}
