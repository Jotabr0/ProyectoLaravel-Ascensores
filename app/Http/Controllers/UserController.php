<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(4);
        return view('users.verUsers', compact('users'));
    }



    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('dashboard');
        }

        // Autenticación fallida
        return redirect('login')->withErrors([
            'email' => 'Las credenciales ingresadas son incorrectas.',
        ]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.nuevoUser');
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
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|digits:9',
            'password' => 'required|min:8',
            'tipo' => 'required',
            'direccion' => 'nullable',
            'dni' => 'required', 
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->password = $request->password;
        $user->tipo = $request->tipo;
        $user->direccion = $request->direccion;
        $user->dni = $request->dni;
        
        $user->save();


        return redirect()->route('user.index')
            ->with('success', 'Empleado creado exitosamente.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
 
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|digits:9',
            'password' => 'required|min:8',
            'tipo' => 'required',
            'direccion' => 'nullable',
            'dni' => 'nullable', // 'regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'
        ]);

        // $user->password = Hash::make($validatedData['password']);
       // $user->password = Hash::make($request->input('password'));
        $validatedData['password'] = Hash::make($request->password);



        $user->fill($validatedData);
        $user->save();

        return redirect()->route('user.index')->with('success', 'El usuario ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'El empleado ha sido eliminado con éxito');
    }
}
