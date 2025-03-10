<?php

namespace App\Providers\Filament;

use App\Filament\App\Pages\Auth;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('app')
            ->path('/')
            ->spa()
            ->login(Auth::class)
            ->registration(Auth::class)
            ->darkMode(false)
            ->brandName('DKHSA')
            ->favicon(asset('images/favicon.ico'))
            ->font('Be Vietnam Pro')
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->maxContentWidth(MaxWidth::Full)
            ->sidebarFullyCollapsibleOnDesktop()
            ->navigationItems([
                NavigationItem::make('facebookGroup')
                    ->label('Facebook Group')
                    ->url('https://facebook.com/groups/dkhsa', true)
                    ->icon('ionicon-logo-facebook')
                    ->sort(2),
            ])
            ->discoverResources(app_path('Filament/App/Resources'), 'App\\Filament\\App\\Resources')
            ->discoverPages(app_path('Filament/App/Pages'), 'App\\Filament\\App\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(app_path('Filament/App/Widgets'), 'App\\Filament\\App\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class
            ])
            ->viteTheme('resources/css/filament/app/theme.css');
    }
}
