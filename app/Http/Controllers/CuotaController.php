<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Cliente;
use Illuminate\Http\Request;


class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cuotas = Cuota::getAllCuotas()->paginate(5);
        return view('cuotas.verCuotas', compact('cuotas'));
    }

    public function generarCuotas()
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $cuota = new Cuota;
            $cuota->concepto = "Mantenimiento " . date('d') . "/" . date('m') . "/" . date('Y') . " para " . $cliente->nombre;
            $cuota->fecha_emision = date('Y-m-d');
            $cuota->pagada = "No";
            $cuota->importe = $cliente->importe;
            $cuota->cliente_id = $cliente->id;

            $cuota->save();
        }

        return redirect()->back()->with('success', 'Cuotas generadas correctamente.');
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function show(Cuota $cuota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuota = Cuota::find($id);

        return view('cuotas.modificarCuota', compact('cuota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cuota = Cuota::find($id);



        $validatedData = $request->validate([
            'importe' => 'required',
            'pagada' => 'nullable',
            'notas' => 'nullable',
        ]);

        $cuota->fill($validatedData);
        $cuota->save();

        return redirect()->route('cuota.index')->with('success', 'La cuota ha sido actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuota::find($id)->delete();
        return redirect()->route('cuota.index')->with('success', 'La cuota ha sido eliminada con éxito');
    }
}
