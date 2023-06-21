<?php

namespace App\Forms;

use App\Models\State;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class UpdateCitieseForm extends AbstractForm
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
            Text::make('name')
                ->label(__('City Name'))
                ->rules(['required']),

            Select::make('state_id')
                ->label(__('Select State'))
                ->options(State::pluck('name', 'id')->toArray())
                ->rules(['required']),

            //

            Submit::make()
                ->label(__('Update')),
        ];
    }
}
