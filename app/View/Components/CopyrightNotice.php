<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CopyrightNotice extends Component
{
    public function render(): string
    {
        return <<<'blade'
            <div class="p-6 pb-5 text-sm text-gray-600">
                <p>v1.4.3 build 250220</p>
                <p>© 2024 - 2025 DKHSA</p>
            </div>
        blade;
    }
}
