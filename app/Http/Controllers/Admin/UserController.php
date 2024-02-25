<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('messageAlert', 'Rol existente.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role asignado.');
    }

    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('messagedestroy', 'Rol Removido.');
        }

        return back()->with('messageAlert', 'Rol no existente.');

    }

    public function givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('messageAlert', 'Permiso existente.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permiso agregado.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){

            $user->revokePermissionTo($permission);
            return back()->with('messagedestroy', 'Permiso removido.');
        }
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('messageAlert', 'No puedes eliminar un usuario admin.');
        }
        $user->delete();
        return back()->with('messagedestroy', 'Usuario eliminado.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate(['name' => ['required'], 'email' => ['required'], 'password' => ['required']]);
            
        //$validated['email'] = $validated['email'].'@pizarro.com';
        try{
            User::create($validated);
            return to_route('admin.users.index')->with('message', 'Usuario creado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Correo existente, pruebe otro.');
        }
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(['name' => 'required', 'email' => 'required']);
        $password=$request->input('password');
        if($password) $validated['password'] = $password;
        
        $user->update($validated);

        return to_route('admin.users.index')->with('message', 'Usuario actualisado correctamente.');
    }
}
