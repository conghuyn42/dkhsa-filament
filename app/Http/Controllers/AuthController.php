<?php

namespace App\Http\Controllers;

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController
{
    public function __invoke(): LoginResponse|RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::query()->updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'ip_address' => Request::getClientIp(),
                ]
            );

            Filament::auth()->login($user);

            return app(LoginResponse::class);
        } catch (\Exception $_) {
            return Redirect::route('filament.app.pages.dashboard');
        }
    }
}
