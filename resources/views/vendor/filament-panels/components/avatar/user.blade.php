@props(['user' => filament()->auth()->user()])

<div class="flex items-center">
    <x-filament::avatar
        :src="filament()->getUserAvatarUrl($user)"
        :alt="__('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)])"
        size="h-9 w-9"
        :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->class(['fi-user-avatar'])"
    />
    <div class="text-start ml-1.5">
        <p class="text-sm font-medium text-gray-900">
            {{ filament()->getUserName($user)}}
        </p>
        <p class="text-xs font-medium text-gray-600">
            Số dư: {{ number_format($user->balance) }}₫
        </p>
    </div>
</div>
