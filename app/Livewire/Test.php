<?php

namespace App\Livewire;

use App\Filament\Actions\TestAction;
use Livewire\Component;
use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class Test extends Component
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function testAction(): Action
    {
        return TestAction::make('test');
    }

    public function render()
    {
        return view('livewire.test');
    }
}
