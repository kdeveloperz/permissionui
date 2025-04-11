<?php

namespace Kacedeveloperz\Permissionui\Http\Controllers;

use Illuminate\Routing\Controller;
use Kacedeveloperz\Permissionui\Http\Requests\PermissionRequest;
use Kacedeveloperz\Permissionui\Http\Resources\PermissionResource;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $permissions = PermissionResource::collection(Permission::paginate(5));
        return Inertia::render('kace-permission/permission/Manage', [
            'permissions' => $permissions
        ]);
        return Inertia::render('kace-permission/permission/Manage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('kace-permission/permission/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        // $this->authorize('manageRole', Role::class);
        Permission::create($request->validated());
        return redirect()->route('permission.index')->with(['status' => 'success', 'message' => 'Permission Created Successfully.']);
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
    public function edit(Permission $permission)
    {
        // $this->authorize('manageRole', Role::class);
        return Inertia::render('kace-permission/permission/Edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        // $this->authorize('manageRole', Role::class);
        $permission->update($request->validated());
        return redirect()->route('permission.index')->with(['status' => 'success', 'message' => 'Permission Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $this->authorize('manageRole', Role::class);
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permission.index')->with(['status' => 'success', 'message' => 'Permission Deleted Successfully.']);
    }

    public function home()
    {
        return view("permissionui::home");
    }
}
