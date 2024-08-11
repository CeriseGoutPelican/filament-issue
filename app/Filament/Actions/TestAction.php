<?php

namespace App\Filament\Actions;

use Livewire\Component;
use Filament\Actions\Action;

class TestAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->action(fn(Component $livewire) => dump($livewire));
    }
}
