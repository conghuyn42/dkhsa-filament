<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;

class PrivacyPolicy extends Page
{
    protected static ?string $title = 'Chính sách bảo mật';
    protected static ?string $navigationIcon = 'heroicon-s-document-text';
    protected static string $view = 'filament.app.pages.privacy-policy';
    protected static ?string $slug = 'tai-lieu/chinh-sach-bao-mat';
    protected static ?string $navigationGroup = 'Tài liệu';
    protected static ?int $navigationSort = 2;
    protected ?string $maxContentWidth = MaxWidth::FourExtraLarge->value;
}
