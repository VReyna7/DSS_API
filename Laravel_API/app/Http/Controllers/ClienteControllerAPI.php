<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //index para crear
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new CLiente;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->edad = $request->edad;
        $cliente->salario = $request->salario;
        return $cliente->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Cliente::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //index para editar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->edad = $request->edad;
        $cliente->salario = $request->salario;
        return $cliente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Cliente::destroy($id);
    }
}
