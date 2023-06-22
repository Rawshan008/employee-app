<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class UpdateDepartmentForm extends AbstractForm
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
                ->label(__('Department Name'))
                ->rules(['required']),

            //

            Submit::make()
                ->label(__('Update')),
        ];
    }
}
