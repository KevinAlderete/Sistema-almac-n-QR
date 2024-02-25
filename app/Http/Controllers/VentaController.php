<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $venta = Venta::all();
        $categorias = Categoria::all();
        $proveedors = Proveedor::all();
        return view('ventas.index', compact('venta','categorias','proveedors'));
    }

    public function codeqr(Request $request, Categoria $categorias, Proveedor $proveedors, Articulo $articulos)
    {
        $categorias= Categoria::all();
        $proveedors = Proveedor::all();
        $articulos = Articulo::all();
        $validated = $request->validate([
            'codeqr' => 'required'
        ]);
        foreach ($categorias as $categoria) {
            if($validated['codeqr'] == $categoria->uuid) {
                $codeqr = $validated['codeqr'];
                return view('ventas.create', compact('categorias', 'proveedors', 'codeqr', 'articulos'));
            }
        }
        return to_route('ventas.index')->with('messageAlertAsistencia', 'Codigo QR incorecto.');
    }

    public function create()
    {
        return view('ventas.create');
    }


    public function store(Request $request, Venta $ventas)
    {
        
        $validated = $request->validate([
            'n_boleta' => 'required',
            'dni' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required',
            'numero' => 'required',
            'precio' => 'required',
            'id_categoria' => 'nullable',
            'id_articulo' => 'nullable'
        ]);
        //$validated['estado'] = 'En almacen';
        Venta::create($validated);
        return to_route('ventas.index')->with('messageAsistencia', 'Venta registrada correctamente.');

        // return to_route('articulos.index')->with('messageAlertAsistencia', 'Articulo no encontrado.');
    }

    public function edit(Venta $venta, Proveedor $provedors, Articulo $articulos)
    {
        
        $proveedors = Proveedor::all();
        $articulos = Articulo::all();
        return view('ventas.edit', compact('venta', 'articulos', 'proveedors'));
    }

    public function update(Request $request, Venta $venta)
    {
        
        $validated = $request->validate([
            'n_boleta' => 'required',
            'dni' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required',
            'numero' => 'required',
            'precio' => 'required',
            'id_articulo' => 'nullable'
        ]);
        $venta->update($validated);

        return to_route('reporte.index')->with('message', 'Venta actualisada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        try{
            $venta->delete();
            return to_route('reporte.index')->with('message', 'Venta eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Esta venta no se puede eliminar.');
        }
    }
}
