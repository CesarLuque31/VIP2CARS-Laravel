@extends('layouts.app')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">🚗 Detalles del Vehículo</h1>
    </div>
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <dt class="text-sm text-slate-500">Placa</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->placa }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Marca</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->marca }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Modelo</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->modelo }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Año de Fabricación</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->anio_fabricacion }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Nombre del Cliente</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->cliente_nombre }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Apellidos del Cliente</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->cliente_apellido }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Número de Documento</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->cliente_documento }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Correo Electrónico</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->cliente_correo }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Teléfono</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->cliente_telefono }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Fecha de Creación</dt>
                <dd class="text-base font-medium text-slate-900">{{ $vehiculo->created_at->format('d/m/Y H:i:s') }}</dd>
            </div>
        </dl>

        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('vehiculos.index') }}" class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">← Volver</a>
            <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="inline-flex items-center rounded-lg bg-amber-500 px-3 py-2 text-sm font-semibold text-white hover:bg-amber-400">✏️ Editar</a>
            <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este vehículo?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center rounded-lg bg-rose-600 px-3 py-2 text-sm font-semibold text-white hover:bg-rose-500">🗑️ Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
