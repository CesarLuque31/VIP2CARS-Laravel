@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">➕ Nuevo Vehículo</h1>
    </div>
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <form action="{{ route('vehiculos.store') }}" method="POST" class="space-y-6">
                            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="placa" class="block text-sm font-medium text-slate-700">Placa</label>
                    <input type="text" id="placa" name="placa" value="{{ old('placa') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('placa') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="marca" class="block text-sm font-medium text-slate-700">Marca</label>
                    <input type="text" id="marca" name="marca" value="{{ old('marca') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('marca') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="modelo" class="block text-sm font-medium text-slate-700">Modelo</label>
                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('modelo') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="anio_fabricacion" class="block text-sm font-medium text-slate-700">Año de Fabricación</label>
                    <input type="number" id="anio_fabricacion" name="anio_fabricacion" value="{{ old('anio_fabricacion') }}" min="1900" max="{{ date('Y') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('anio_fabricacion') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="cliente_nombre" class="block text-sm font-medium text-slate-700">Nombre del Cliente</label>
                    <input type="text" id="cliente_nombre" name="cliente_nombre" value="{{ old('cliente_nombre') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cliente_nombre') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="cliente_apellido" class="block text-sm font-medium text-slate-700">Apellidos del Cliente</label>
                    <input type="text" id="cliente_apellido" name="cliente_apellido" value="{{ old('cliente_apellido') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cliente_apellido') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="cliente_documento" class="block text-sm font-medium text-slate-700">Número de Documento</label>
                    <input type="text" id="cliente_documento" name="cliente_documento" value="{{ old('cliente_documento') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cliente_documento') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="cliente_correo" class="block text-sm font-medium text-slate-700">Correo Electrónico</label>
                    <input type="email" id="cliente_correo" name="cliente_correo" value="{{ old('cliente_correo') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cliente_correo') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="cliente_telefono" class="block text-sm font-medium text-slate-700">Teléfono</label>
                    <input type="tel" id="cliente_telefono" name="cliente_telefono" value="{{ old('cliente_telefono') }}" required class="mt-1 w-full rounded-lg border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('cliente_telefono') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('vehiculos.index') }}" class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">← Volver</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">💾 Guardar Vehículo</button>
            </div>
        </form>
    </div>
</div>
@endsection
