<?php

namespace App\View\Components;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\View\Component;

class LoginButton extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function render(): Action
    {
        return Action::make('loginButton')
            ->label('Đăng nhập')
            ->color('gray')
            ->url(Filament::getLoginUrl())
            ->button();
    }
}
