<?php

namespace App\Forms;

use App\Models\Country;
use App\Models\State;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;

class UpdateStateForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->method('PUT')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Input::make('name')
                ->label(__('State Name'))
                ->rules(['required']),

            Select::make('country_id')
                ->label('Country Code')
                ->options(Country::pluck('name', 'id')->toArray())
                ->rules(['required']),

            //

            Submit::make()
                ->label(__('Update')),
        ];
    }
}
