<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'anio_fabricacion',
        'cliente_nombre',
        'cliente_apellido',
        'cliente_documento',
        'cliente_correo',
        'cliente_telefono',
        'esta_activo',
    ];

    protected $casts = [
        'anio_fabricacion' => 'integer',
        'esta_activo' => 'boolean',
    ];
}
