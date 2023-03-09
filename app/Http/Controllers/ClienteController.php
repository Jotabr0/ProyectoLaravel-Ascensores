<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(4);
        return view('clientes.verClientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        return view('clientes.nuevoCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'cif' => 'required',
            'nombre' => 'required',
            'telefono' => 'required|digits:9',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'pais' => 'required',
            'moneda' => 'required', 
            'importe' => 'required'
        ]);

        $cliente = new Cliente();
        $cliente->cif = $request->cif;
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->cuenta_corriente = $request->cuenta_corriente;
        $cliente->pais = $request->pais;
        $cliente->moneda = $request->moneda;
        $cliente->importe = $request->importe;
        


        $cliente->save();


        return redirect()->route('cliente.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.editCliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
 
        $validatedData = $request->validate([
            'cif' => 'required',
            'nombre' => 'required',
            'telefono' => 'digits:9',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'pais' => 'nullable',
            'moneda' => 'nullable', 
            'importe' => ''
        ]);

        $cliente->fill($validatedData);
        $cliente->save();

        return redirect()->route('cliente.index')->with('success', 'El cliente ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index')->with('success', 'El cliente ha sido eliminado con éxito');
    }
}
