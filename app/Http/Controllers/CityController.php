<?php

namespace App\Http\Controllers;

use App\Forms\CreateCitieseForm;
use App\Forms\UpdateCitieseForm;
use App\Forms\UpdateStateForm;
use App\Models\City;
use App\Models\State;
use App\Tables\Cities;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index', [
            'cities' => Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create', [
            'form' => CreateCitieseForm::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateCitieseForm $form, City $city)
    {
        $data = $form->validate($request);
        $city->create($data);
        Splade::toast('City Added Successfully')->autoDismiss(15);
        return to_route('admin.city.index');
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
    public function edit(City $city)
    {
        return view('admin.cities.edit', [
            'form' => UpdateCitieseForm::make()
                ->action(route('admin.city.update', $city))
                ->fill($city),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpdateCitieseForm $form,  City $city)
    {
        $data = $form->validate($request);
        $city->update($data);
        Splade::toast('City Update Successfully')->autoDismiss(15);
        return to_route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        Splade::toast()->warning('City Deleted Successfully');
        return to_route('admin.city.index');
    }
}
