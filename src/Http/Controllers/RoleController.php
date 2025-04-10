<?php

namespace Kacedeveloperz\Permissionui\Http\Controllers;

use Illuminate\Routing\Controller;
use Kacedeveloperz\Permissionui\Http\Requests\RoleRequest;
use Kacedeveloperz\Permissionui\Http\Resources\PermissionResource;
use Kacedeveloperz\Permissionui\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleResource::collection(Role::paginate(5));
        return Inertia::render('kace-permission/role/Manage', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create');
        return Inertia::render('kace-permission/role/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        // $this->authorize('manageRole', Role::class);
        Role::create($request->validated());
        return redirect()->route('role.index')->with(['status' => 'success', 'message' => 'Permission Updated Successfully.']);
    }

    public function assignPermissionView()
    {
        // $this->authorize('managePermission', Role::class);
        $roles = RoleResource::collection(Role::paginate(5));
        $permissions = PermissionResource::collection(Permission::all());
        return Inertia::render('kace-permission/role/AssignPermissions', compact('roles', 'permissions'));
    }

    public function assignPermission(Request $request, Role $role)
    {
        // $this->authorize('managePermission', Role::class);
        $role->syncPermissions($request->input('permissions.*.name'));
        return redirect()->back()->with(['status' => 'success', 'message' => 'Permission Assigned Successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // $this->authorize('manageRole', Role::class);
        return Inertia::render('kace-permission/role/Edit', [
            'role' => $role
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        // $this->authorize('manageRole', Role::class);
        $role->update($request->validated());
        return redirect()->route('role.index')->with(['status' => 'success', 'message' => 'Role Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $this->authorize('manageRole', Role::class);
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with(['status' => 'success', 'message' => 'Role Deleted Successfully.']);
    }
}
