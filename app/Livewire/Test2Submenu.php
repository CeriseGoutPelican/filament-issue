<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Actions\Action;
use App\Filament\Actions\Test2Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class Test2Submenu extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function testAction(): Action
    {
        return Test2Action::make('test');
    }

    public function placeholder()
    {
        return "<div>Loading...</div>";
    }

    public function render()
    {
        return view('livewire.test2-submenu');
    }
}
