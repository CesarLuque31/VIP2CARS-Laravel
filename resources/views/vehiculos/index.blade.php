@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h1 class="text-2xl font-semibold tracking-tight">Vehículos</h1>
        <form method="GET" action="{{ route('vehiculos.index') }}" class="flex w-full sm:w-auto items-center gap-2">
            <input type="text" name="q" value="{{ $busqueda ?? '' }}" class="w-full sm:w-80 rounded-lg border-slate-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Buscar por placa, marca, modelo o cliente">
            <button class="inline-flex items-center rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-700">Buscar</button>
        </form>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse text-left text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-slate-600">Placa</th>
                        <th class="px-4 py-2 font-semibold text-slate-600">Marca</th>
                        <th class="px-4 py-2 font-semibold text-slate-600">Modelo</th>
                        <th class="px-4 py-2 font-semibold text-slate-600">Año</th>
                        <th class="px-4 py-2 font-semibold text-slate-600">Cliente</th>
                        <th class="px-4 py-2 font-semibold text-slate-600 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse($vehiculos as $vehiculo)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-2">{{ $vehiculo->placa }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->marca }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->modelo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->anio_fabricacion }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->cliente_nombre }} {{ $vehiculo->cliente_apellido }}</td>
                        <td class="px-4 py-2 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('vehiculos.show', $vehiculo) }}" class="inline-flex items-center rounded-lg bg-sky-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-sky-500">Ver</a>
                                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="inline-flex items-center rounded-lg bg-amber-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-amber-400">Editar</a>
                                <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center rounded-lg bg-rose-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-rose-500">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">No hay vehículos registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200">
            {{ $vehiculos->links() }}
        </div>
    </div>
</div>
@endsection

