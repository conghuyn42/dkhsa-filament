<?php

namespace App\Filament\App\Pages;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\SimplePage;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Laravel\Socialite\Facades\Socialite;

class Auth extends SimplePage implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected ?string $heading = 'Đăng nhập hoặc đăng ký';
    protected static string $view = 'filament.app.pages.auth';
    public ?array $data = [];

    public function getTitle(): string|Htmlable
    {
        return request()->routeIs('filament.app.auth.login')
            ? 'Đăng nhập'
            : 'Đăng ký';
    }

    public function mount(): void
    {
        if (filament()->auth()->check()) {
            redirect()->intended(filament()->getUrl());
        }

        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Checkbox::make('termsOfService')
                    ->label(function (): HtmlString {
                        return new HtmlString("Tôi đồng ý với {$this->termsOfServiceLink()->render()}");
                    })
                    ->accepted()
                    ->validationMessages([
                        'accepted' => 'Bạn chưa đồng ý với điều khoản dịch vụ.',
                    ])
            ])
            ->statePath('data');
    }

    public function continueButton(): Action
    {
        return Action::make('continue')
            ->label('Tiếp tục với Google')
            ->color('primary')
            ->icon('ionicon-logo-google')
            ->submit('continue')
            ->button();
    }

    public function continue(): void
    {
        $this->form->getState();

        redirect()->to(Socialite::driver('google')->redirect()->getTargetUrl());
    }

    public function termsOfServiceLink(): Action
    {
        return Action::make('termsOfService')
            ->label('điều khoản dịch vụ')
            ->url(route('filament.app.pages.tai-lieu.dieu-khoan-dich-vu'), true)
            ->link();
    }
}
