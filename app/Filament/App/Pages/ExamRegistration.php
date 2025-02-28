<?php

namespace App\Filament\App\Pages;

use App\View\Components\BookButton;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class ExamRegistration extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-sparkles';
    protected static string $view = 'filament.app.pages.exam-registration';
    protected static ?string $title = 'Đăng ký hộ';
    protected static ?string $slug = 'dang-ky-ho';
    public ?array $data = [];

    public function mount(): void
    {
        if (!filament()->auth()->check()) {
            redirect()->to(filament()->getLoginUrl());
        }
    }

    public function book(): void
    {
        dd($this->form->getState());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->heading('Thông tin cần thiết')
                            ->description('Đợt thi, địa điểm, ca thi và thông tin đăng nhập')
                            ->columns([
                                'sm' => 1,
                                'md' => 2,
                                'lg' => 3,
                            ])
                            ->schema([
                                Select::make('period')
                                    ->label('Đợt thi')
                                    ->options([
                                        '501' => 'Đợt 501',
                                        '502' => 'Đợt 502',
                                        '503' => 'Đợt 503',
                                        '504' => 'Đợt 504',
                                        '505' => 'Đợt 505',
                                        '506' => 'Đợt 506'
                                    ])
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng chọn đợt thi.',
                                    ]),
                                Select::make('location')
                                    ->label('Địa điểm')
                                    ->options([
                                        'hanoi' => 'Hà Nội',
                                    ])
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng chọn địa điểm.',
                                    ]),
                                Select::make('slot')
                                    ->label('Ca thi')
                                    ->options([])
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng chọn ca thi.',
                                    ]),
                                TextInput::make('username')
                                    ->label('Số điện thoại/Email')
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập số điện thoại hoặc email.',
                                    ]),
                                TextInput::make('password')
                                    ->label('Mật khẩu')
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Vui lòng nhập mật khẩu.',
                                    ]),
                            ])
                            ->statePath('data')
                            ->footerActions([
                                Action::make('book')
                                    ->label('Đặt đăng ký hộ')
                                    ->extraAttributes([
                                        'class' => 'w-full'
                                    ])
                                    ->action('book')
                            ])
                            ->columnSpan(2),
                        Placeholder::make('howItWorks')
                            ->label(new HtmlString(<<<HTML
                                <h3 class="text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                    DKHSA đăng ký ca thi như thế nào?
                                </h3>
                            HTML))
                            ->content(new HtmlString(<<<HTML
                                <p class="overflow-hidden break-words text-sm text-gray-600 dark:text-gray-400 mt-1.5">
                                    Khi phía HSA mở đăng ký lúc 09:00 ngày 23/02/2025,
                                    hệ thống sẽ <b>ngay lập tức</b> đăng ký ca thi cho bạn dựa trên thông tin đã có.
                                    Hệ thống tương tác trực tiếp với máy chủ của HSA,
                                    nói đơn giản hơn là sử dụng code chứ không thao tác bằng tay.
                                </p>
                                <p class="overflow-hidden break-words text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    Thống kê năm 2024,
                                    thời gian đăng ký một ca thi dao động từ <b>0.381 giây</b> đến <b>2.605 giây</b>,
                                    với tổng số 45 ca thi đã được đăng ký.
                                </p>
                            HTML))
                            ->columnSpan(1),
                    ])
            ]);
    }
}
