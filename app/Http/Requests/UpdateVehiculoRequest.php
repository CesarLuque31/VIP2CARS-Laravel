<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $vehiculoId = $this->route('vehiculo')?->id;

        return [
            'placa' => 'required|string|max:20|unique:vehiculos,placa,' . $vehiculoId,
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio_fabricacion' => 'required|integer|min:1900|max:'.date('Y'),
            'cliente_nombre' => 'required|string|max:100',
            'cliente_apellido' => 'required|string|max:100',
            'cliente_documento' => 'required|string|max:20',
            'cliente_correo' => 'required|email|max:255',
            'cliente_telefono' => 'required|string|max:20',
        ];
    }

    public function attributes(): array
    {
        return [
            'placa' => 'placa',
            'marca' => 'marca',
            'modelo' => 'modelo',
            'anio_fabricacion' => 'año de fabricación',
            'cliente_nombre' => 'nombre del cliente',
            'cliente_apellido' => 'apellidos del cliente',
            'cliente_documento' => 'número de documento',
            'cliente_correo' => 'correo electrónico',
            'cliente_telefono' => 'teléfono',
        ];
    }
}
