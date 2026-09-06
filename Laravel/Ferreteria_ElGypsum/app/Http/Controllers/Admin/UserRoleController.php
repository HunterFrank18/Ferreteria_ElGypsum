<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'cajero', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'bodega', 'guard_name' => 'web']);

        $users = User::with('roles')->latest()->paginate(10);
        $roles = Role::orderBy('name')->get();

        return view('admin.users.roles', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => 'nullable|exists:roles,name',
        ]);

        if (empty($data['role'])) {
            $user->syncRoles([]);
        } else {
            $user->syncRoles([$data['role']]);
        }

        return back()->with('success', 'Rol del usuario actualizado correctamente.');
    }

    public function updatePassword(Request $request, User $user)
    {
        $data = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('success', 'Contrasena actualizada correctamente.');
    }

    public function storeRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:roles,name',
        ]);

        Role::create([
            'name' => strtolower(trim($data['name'])),
            'guard_name' => 'web',
        ]);

        return back()->with('success', 'Rol creado correctamente.');
    }

    public function updateRole(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
        ]);

        $role->update([
            'name' => strtolower(trim($data['name'])),
        ]);

        return back()->with('success', 'Rol actualizado correctamente.');
    }

    public function destroyRole(Role $role)
    {
        if ($role->name === 'admin') {
            return back()->with('error', 'No puedes eliminar el rol admin.');
        }

        if ($role->users()->count() > 0) {
            return back()->with('error', 'No puedes eliminar un rol que tiene usuarios asignados.');
        }

        $role->delete();

        return back()->with('success', 'Rol eliminado correctamente.');
    }
}
