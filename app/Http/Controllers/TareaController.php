<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;






class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tareas = Tarea::getAllTareas();
        return view('tareas.tareasVer', compact('tareas'));
    }


    public function verPendientes()
    {
        $tareas = Tarea::where('estado', '=', 'P')->paginate(4);
        return view('tareas.tareasVerPendientes', compact('tareas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operarios = User::getOperarios();
        $clientes = Cliente::getClientes();
        return view('tareas.nuevaTarea', compact('operarios', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (!Auth::check()) {
        //     // Si no está autenticado, devolver una respuesta con una alerta en el navegador
        //     return back()->with('error', 'Debe iniciar sesión para agregar una nueva tarea.');
        // }


        $verifyCliente = false;
        if (!Auth::check()) {
            $verifyCliente = true;
        }

        $request->validate([
            'cliente_id' => 'nullable',
            'persona_contacto' => 'required',
            'telefono_contacto' => 'required|digits:9',
            'descripcion' => 'required',
            'email' => 'required|email',
            'direccion' => 'nullable',
            'poblacion' => 'nullable',
            'codigo_postal' => 'nullable|digits:5',
            'provincia' => 'required',
            'estado' => 'nullable',
            'operario' => 'nullable',
            'fecha_creacion' => '',
            'fecha_realizacion' => 'nullable|after:today',
            'anotaciones_antes' => 'nullable',
            'cif' => '',
            'telefono' => 'digits:9',
        ]);

        $tarea = new Tarea();
        $tarea->cliente_id = $request->cliente_id;
        $tarea->persona_contacto = $request->persona_contacto;
        $tarea->telefono_contacto = $request->telefono_contacto;
        $tarea->descripcion = $request->descripcion;
        $tarea->email = $request->email;
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacion;
        $tarea->codigo_postal = $request->codigo_postal;
        $tarea->provincia = $request->provincia;
        $tarea->estado = $request->estado;
        $tarea->operario = $request->operario;
        $tarea->fecha_realizacion = $request->fecha_realizacion;
        $tarea->anotaciones_antes = $request->anotaciones_antes;
        $tarea->fecha_creacion = now();

        // $clienteExiste = $this->verificarCliente($request);
        // if (!$clienteExiste) {
        //     return back()->withInput()->with('error', 'El cif y/o teléfono introducidos no coinciden con ningún cliente registrado.');
        // }

        if ($verifyCliente) {
            $cif = $request->input('cif');
            $telefono = $request->input('telefono');

            $cliente = Cliente::where('cif', $cif)
                ->where('telefono', $telefono)
                ->first();

            if ($cliente) {
                $tarea->cliente_id = $cliente->id;
            } else {
                return redirect()->route('tarea.create')
                    ->withErrors(['cliente' => 'El cliente con CIF ' . $cif . ' y teléfono ' . $telefono . ' no existe.'])
                    ->withInput();
            }
        }

        $tarea->save();


        return redirect()->route('tarea.index')
            ->with('success', 'Tarea creada exitosamente.')->with('redirectDelay', 3000);;
    }

    public function verificarCliente(Request $request)
    {
        $cif = $request->input('cif');
        $telefono = $request->input('telefono');

        $cliente = Cliente::where('cif', $cif)
            ->where('telefono', $telefono)
            ->first();

        if ($cliente) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $operarios = User::getOperarios();
        return view('tareas.modificarTarea', compact('tarea', 'operarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        //$data = $request->except('_token');
        //$tarea->fill($data);
        //$tarea->save();


        $validatedData = $request->validate([
            'cliente_id' => 'required',
            'persona_contacto' => 'required',
            'telefono_contacto' => 'required|digits:9',
            'descripcion' => 'required',
            'email' => 'required|email',
            'direccion' => 'nullable',
            'codigo_postal' => 'nullable|digits:5',
            'provincia' => 'required',
            'estado' => 'nullable',
            'operario' => 'nullable',
            'fecha_realizacion' => 'nullable|after:today',
            'anotaciones_despues' => 'nullable',
        ]);

        $tarea->fill($validatedData);
        $tarea->save();

        return redirect()->route('tarea.index')->with('success', 'La tarea ha sido actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarea::find($id)->delete();
        return redirect()->route('tarea.index')->with('success', 'La tarea ha sido eliminada con éxito');
    }
}
