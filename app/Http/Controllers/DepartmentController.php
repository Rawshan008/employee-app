<?php

namespace App\Http\Controllers;

use App\Forms\CreateDepartmentForm;
use App\Forms\UpdateDepartmentForm;
use App\Models\Department;
use App\Tables\Departments;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.departments.index', [
            'departments' => Departments::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( CreateDepartmentForm $form)
    {
        return view('admin.departments.create', [
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateDepartmentForm $form, Department $department)
    {
        $data = $form->validate($request);
        $department->create($data);
        Splade::toast('Department Create Successfully')->autoDismiss(15);
        return to_route('admin.department.index');
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
    public function edit(UpdateDepartmentForm $form, Department $department)
    {
        return view('admin.departments.edit', [
            'form' => $form->make()
                ->action(route('admin.department.update', $department))
                ->fill($department),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpdateDepartmentForm $form, Department $department)
    {
        $data = $form->validate($request);
        $department->update($data);
        Splade::toast('Department Update Successfully')->autoDismiss(15);
        return to_route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        Splade::toast()->warning('Department Delete Successfylly')->autoDismiss(15);
        return to_route('admin.department.index');
    }
}
