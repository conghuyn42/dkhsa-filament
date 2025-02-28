<x-filament-panels::page.simple>
    <div class="rounded-lg bg-yellow-100 p-4">
        <p class="text-sm font-medium text-yellow-700">
            Vì một số lý do, tạm thời chỉ hỗ trợ đăng ký và đăng nhập bằng Google.
        </p>
    </div>
    <div class="rounded-lg bg-yellow-100 p-4 -mt-3">
        <p class="text-sm font-medium text-yellow-700">
            Hãy yên tâm! Google chỉ chia sẻ <b>tên</b>, <b>địa chỉ email</b> và <b>ảnh hồ sơ</b> của bạn.
        </p>
    </div>
    <x-filament-panels::form id="form" wire:submit="continue">
        {{ $this->form }}
        {{ $this->continueButton }}
    </x-filament-panels::form>
</x-filament-panels::page.simple>
