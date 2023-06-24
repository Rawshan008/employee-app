<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Tables\Employees;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;
use App\Forms\CreateEmployeeForm;
use App\Forms\UpdateEmployeeForm;
use ProtoneMedia\Splade\Facades\Splade;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employees.index', [
            'employees' => Employees::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create', [
            'form' => CreateEmployeeForm::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateEmployeeForm $form, Employee $employee)
    {
        $date = $form->validate($request);
        $employee->create($date);
        Splade::toast('Create Employee Successfully')->autoDismiss(15);
        return to_route('admin.employee.index');
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
    public function edit(Employee $employee, UpdateEmployeeForm $form)
    {
        return view('admin.employees.edit', [
            'form' => $form->make()
                            ->action(route('admin.employee.update', $employee))->fill($employee)
                            ->fill($employee),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee, UpdateEmployeeForm $form)
    {
        $date = $form->validate($request);
        $employee->update($date);
        Splade::toast('Employee Update Successfuly')->autoDismiss(15);
        return to_route('admin.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        Splade::toast()->warning('Employee Delete Successfully');
        return to_route('admin.employee.index');
    }
}
