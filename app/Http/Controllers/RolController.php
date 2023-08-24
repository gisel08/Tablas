<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregar Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
    public function index()
   {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
   }

   public function __construct()
   {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only'=>['create','store']]);
        $this->middleware('permission:editar-rol',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]);
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // esta accion create se utiliza para mostrar un fromulario que perimta al usuario crear un nuevo rol
        $permission = Permission::get();
        return view('roles.crear',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //procesar y guardar un nuevo rol en la base de datos del mismo modo asociar los permisos seleccionados con ese rol 
            $this->validate($request,['name' => 'required', 'permission' => 'required']);
            $role = Role::create(['name' => $request ->input('name')]);
            $role->syncPermissions($request->input('permission'));

            return redirect() ->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // esta acción edit se utiliza para mostrar un formulario prellenado con la información del rol que se va a editar,
        // así como para permitir al usuario modificar los permisos asociados a ese rol.
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();

        return view('roles.editar', compact('role','permission','rolePermissions'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
