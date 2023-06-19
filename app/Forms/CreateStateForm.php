<?php

namespace App\Forms;

use App\Models\Country;
use App\Models\State;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class CreateStateForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.state.store'))
            ->method('POST')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Input::make('name')
                ->label('State Name')
                ->rules('required|max:10'),
            Select::make('country_id')
                ->label('Country Code')
                ->options(Country::pluck('name', 'id')->toArray())
                ->rules('required'),

            Submit::make()
                ->label(__('Save')),
        ];
    }
}
