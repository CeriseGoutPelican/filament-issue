<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Comment;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\CheckboxList;

class Settings extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make("Step 1")
                        ->schema([
                            Select::make('user_id')
                                ->options(
                                    User::pluck('name', 'id')
                                        ->toArray()
                                )
                                ->required()
                                ->live(),
                        ]),
                    Wizard\Step::make("Step 2")
                        ->schema(function (Get $get) {
                            return Comment::query()
                                // If the `CheckboxList` is not dynamically generated, then the CheckboxList will work as expected:
                                // Ex: ->where('user_id', auth()->id())
                                ->where('user_id', $get('user_id'))
                                ->get()
                                ->groupBy('category')
                                ->map(function ($comments, $category) {
                                    return CheckboxList::make('comments-' . Str::slug($category))->options($comments->pluck('content', 'id')->toArray());
                                })->toArray();
                        }),
                ]),
            ])->statePath('data');
    }
}
