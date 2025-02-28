<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;

class TermsOfService extends Page
{
    protected static ?string $title = 'Điều khoản dịch vụ';
    protected static ?string $navigationIcon = 'heroicon-s-document-text';
    protected static string $view = 'filament.app.pages.terms-of-service';
    protected static ?string $slug = 'tai-lieu/dieu-khoan-dich-vu';
    protected static ?string $navigationGroup = 'Tài liệu';
    protected ?string $maxContentWidth = MaxWidth::FourExtraLarge->value;
}
