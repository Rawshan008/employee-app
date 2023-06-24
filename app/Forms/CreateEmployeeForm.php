<?php

namespace App\Forms;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\State;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class CreateEmployeeForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.employee.store'))
            ->method('POST')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Input::make('first_name')
                ->label(__('First Name'))
                ->rules(['required']),
            Input::make('last_name')
                ->label('Last Name')
                ->rules(['required']),
            Input::make('middle_name')
                ->label('Middle Name'),
            Select::make('department_id')
                ->label('Department')
                ->options(Department::pluck('name', 'id')->toArray())
                ->rules(['required']),
            Select::make('country_id')
                ->label('Country')
                ->options(Country::pluck('name', 'id')->toArray())
                ->rules(['required']),
            Select::make('state_id')
                ->label('State')
                ->options(State::pluck('name', 'id')->toArray())
                ->rules(['required']),
            Select::make('city_id')
                ->label('City')
                ->options(City::pluck('name', 'id')->toArray())
                ->rules(['required']),
            Input::make('zip_code')
                ->label('Zip Code')
                ->rules(['required']),
            Date::make('birth_date')
                ->label('Birth Date')
                ->rules(['required']),
            Date::make('date_hired')
                ->label('Hire Date')
                ->rules(['required']),

            //

            Submit::make()
                ->label(__('Save')),
        ];
    }
}
