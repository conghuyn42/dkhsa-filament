<?php

namespace App\View\Components;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\View\Component;

class RegisterButton extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function render(): Action
    {
        return Action::make('registerButton')
            ->label('Đăng ký')
            ->url(filament()->getRegistrationUrl())
            ->button();
    }
}
