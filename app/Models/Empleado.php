<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'nombre',
        'apellidos',
        'genero',
        'dni',
        'cargo',
        'email',
        'telefono',
        'direccion',
    ];

    // public function asistencias(): HasMany
    // {
    //     return $this->hasMany(Asistencia::class, 'idEmpleado', 'uuid');
    // }
}
