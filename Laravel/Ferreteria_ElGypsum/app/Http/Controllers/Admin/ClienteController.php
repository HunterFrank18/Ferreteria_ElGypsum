<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(5);
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'limite_credito' => 'nullable|numeric|min:0',
            'estado' => 'required|in:activo,inactivo'
        ]);

        Cliente::create($request->only([
            'nombre',
            'telefono',
            'direccion',
            'limite_credito',
            'estado'
        ]));

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente creado correctamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'limite_credito' => 'nullable|numeric|min:0',
            'estado' => 'required|in:activo,inactivo'
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->only([
            'nombre',
            'telefono',
            'direccion',
            'limite_credito',
            'estado'
        ]));

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente actualizado');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente eliminado');
    }
}
