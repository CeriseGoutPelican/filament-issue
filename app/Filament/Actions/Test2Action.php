<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;

class Test2Action extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('New tags')->action(fn() => dd('Tag created!'));
    }
}
