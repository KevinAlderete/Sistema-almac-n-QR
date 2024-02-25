<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Venta extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'n_boleta',
        'dni',
        'nombre',
        'cantidad',
        'numero',
        'precio',
        'id_categoria',
        'id_articulo',
    ];
    public function toSearchableArray()
    {
        return [
            'created_at' => $this->created_at,
            'nombre' => $this->nombre,
            'numero' => $this->numero,
            'precio' => $this->precio,
        ];
    }

}
