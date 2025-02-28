<?php

namespace App\Providers;

use App\View\Components\CopyrightNotice;
use App\View\Components\LoginButton;
use App\View\Components\RegisterButton;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        URL::forceScheme('https');

        $this->registerFilamentRenderHooks();
    }

    protected function registerFilamentRenderHooks(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::SIDEBAR_FOOTER,
            static fn(): string => Blade::renderComponent(new CopyrightNotice)
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::TOPBAR_END,
            static fn(): ?string => !filament()->auth()->check()
                ? Blade::renderComponent(new LoginButton)
                : null
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::TOPBAR_END,
            static fn(): ?string => !filament()->auth()->check()
                ? Blade::renderComponent(new RegisterButton)
                : null
        );
    }
}
