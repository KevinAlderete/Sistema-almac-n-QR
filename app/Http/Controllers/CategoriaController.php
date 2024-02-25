<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria' => 'required',
            'marca' => 'required',
            'modelo' => 'required'
        ]);
        $validated['uuid'] = (string) Str::orderedUuid();
        Categoria::create($validated);
        return to_route('categorias.index')->with('message', 'Categoria registrada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        
        $validated = $request->validate([
            'categoria' => 'required',
            'marca' => 'required',
            'modelo' => 'required'
        ]);
        $categoria->update($validated);

        return to_route('categorias.index')->with('message', 'Categoria actualisada correctamente.');
    }
    
    public function destroy(Categoria $categoria)
    {
        try{
            $categoria->delete();
            return to_route('categorias.index')->with('message', 'Categoria eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este categoria no se puede eliminar.');
        }
    }
    public function codeQR(Categoria $categoria)
    {
        $pdf = Pdf::loadView('categorias.codeQR', compact('categoria'));
        return $pdf->stream('categoriaQR.pdf');
    }
}
