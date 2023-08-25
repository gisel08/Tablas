<?php

namespace App\Http\Controllers;

use App\Models\Divisione;
use Illuminate\Http\Request;

class DivisioneController extends Controller
{
         //El controlador verifica  si el usuario tiene los permisos adecuados para realizar esas acciones.

    public function __construct()
    {
        $this->middleware('permission:ver-division|crear-division|editar-division|borrar-division', ['only'=>['index']]);
        $this->middleware('permission:crear-division', ['only'=>['create','store']]);
        $this->middleware('permission:editar-division',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-division',  ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            // Obtiene todas las divisiones de la base de datos
        $division = Divisione::all();
        // Retorna la vista 'divisiones.index' y pasa las divisiones como datos
        return view('division.index', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          // Retorna la vista 'divisiones.create' para mostrar el formulario de creación
        return view('division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            // Validar el formulario de entrada, asegurando que el campo 'nombre' sea requerido y único en la tabla 'divisiones'.
        request()->validate([
            'nombre' => 'required|unique:divisiones,nombre',
        ]);
        // Crear un nuevo registro de 'Divisione' con los datos proporcionados en la solicitud.
        Divisione::create($request->all());
        // Redirigir al usuario a la vista de índice de divisiones después de crear con éxito.
        return redirect()->route('divisiones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisione $divisione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisione $divisione)
    {
        //
            // Retorna la vista 'divisiones.edit' y pasa la división a editar como dato
        return view('division.edit', compact('divisione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisione $divisione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisione $divisione)
    {
        //
        // Elimina la instancia de 'Divisione' proporcionada como argumento.
        $divisione->delete();
        // Redirige al usuario a la vista de índice de divisiones después de la eliminación exitosa.
        return redirect()->route('divisiones.index');
    }
}
