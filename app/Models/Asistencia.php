<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEmpleado',
    ];

    // public function empleado(): BelongsTo
    // {
    //     return $this->belongsTo(Empleado::class, 'idEmpleado', 'uuid');
    // }
}
