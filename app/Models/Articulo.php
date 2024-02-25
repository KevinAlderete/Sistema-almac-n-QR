<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Articulo extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'imei',
        'precio',
        'color',
        'almacenamiento',
        'ran',
        'cantidad',
        'descricion',
        'estado',
        'categoria_uuid',
        'id_proveedor',
        'id_categoria',
    ];

    public function toSearchableArray()
    {
        return [
            'created_at' => $this->created_at,
            'precio' => $this->precio,
            'color' => $this->color,
            'almacenamiento' => $this->almacenamiento,
            'ran' => $this->ran,
        ];
    }

    
}
