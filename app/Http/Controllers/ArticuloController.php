<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulo = Articulo::all();
        $categorias = Categoria::all();
        $proveedors = Proveedor::all();
        return view('articulos.index', compact('articulo','categorias','proveedors'));
    }

    public function reporte()
    {
        $articulos = Articulo::search(Request('search'))->paginate(5);
        $categorias = Categoria::all();
        $proveedors = Proveedor::all();

        return view('articulos.reporte', compact('articulos','categorias','proveedors'));
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
                return view('articulos.create', compact('categorias', 'proveedors', 'codeqr', 'articulos'));
            }
        }
        return to_route('articulos.index')->with('messageAlertAsistencia', 'Codigo QR incorecto.');
    }

    public function create()
    {
        return view('articulos.create');
    }


    public function store(Request $request, Articulo $articulos)
    {
        
        $validated = $request->validate([
            'imei' => 'required',
            'precio' => 'required',
            'color' => 'required',
            'almacenamiento' => 'required',
            'ran' => 'required',
            'cantidad' => 'required',
            'descricion' => 'nullable',
            'categoria_uuid' => 'nullable',
            'id_categoria' => 'nullable',
            'id_proveedor' => 'nullable'
        ]);
        $validated['estado'] = 'En almacen';
        // foreach ($articulos as $articulo) {
        //     if($request['nombre'] == $articulo->nombre){ 
        //         Articulo::create($validated);
        //         return to_route('articulos.index')->with('messageAsistencia', 'Articulo registrado correctamente.');
        //     }
        // }
        Articulo::create($validated);
        return to_route('articulos.index')->with('messageAsistencia', 'Articulo registrado correctamente.');

        // return to_route('articulos.index')->with('messageAlertAsistencia', 'Articulo no encontrado.'); 
        
    }

    public function edit(Articulo $articulo, Proveedor $provedors)
    {
        
        $proveedors = Proveedor::all();
        return view('articulos.edit', compact('articulo', 'proveedors'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        
        $validated = $request->validate([
            'imei' => 'required',
            'precio' => 'required',
            'color' => 'required',
            'almacenamiento' => 'required',
            'ran' => 'required',
            'cantidad' => 'required',
            'descricion' => 'nullable',
            'id_proveedor' => 'nullable'
        ]);
        $articulo->update($validated);

        return to_route('articulos.reporte')->with('message', 'Articulo actualisado correctamente.');
    }

    public function destroy(Articulo $articulo)
    {
        try{
            $articulo->delete();
            return to_route('articulos.reporte')->with('message', 'Articulo eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este articulo no se puede eliminar.');
        }
    }


}
