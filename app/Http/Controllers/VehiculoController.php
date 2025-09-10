<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;

class VehiculoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim((string) $request->query('q', ''));

        $vehiculos = Vehiculo::query()
            ->when($busqueda !== '', function ($q) use ($busqueda) {
                $q->where('placa', 'like', "%{$busqueda}%")
                  ->orWhere('marca', 'like', "%{$busqueda}%")
                  ->orWhere('modelo', 'like', "%{$busqueda}%")
                  ->orWhere('cliente_nombre', 'like', "%{$busqueda}%")
                  ->orWhere('cliente_apellido', 'like', "%{$busqueda}%");
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('vehiculos.index', compact('vehiculos', 'busqueda'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(StoreVehiculoRequest $request)
    {
        Vehiculo::create($request->validated());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado exitosamente');
    }

    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validated());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado exitosamente');
    }
}
