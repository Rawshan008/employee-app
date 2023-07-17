<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Tables\Roles;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Role;

class RoleColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Roles::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRolesRequest $request)
    {
        Role::create($request->validated());
        Splade::toast('Create Role Successfully')->autoDismiss(3);
        return to_route('admin.roles.index');
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
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $role->update($request->validated());
        Splade::toast('Role Update Succcessfully')->autoDismiss(3);
        return to_route('admin.roles.index');
    }

    /**Spla
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Splade::toast()->warning('Role Delete Successfully')->autoDismiss(3);
        return to_route('admin.roles.index');
    }
}
