@props([
    'size' => 'medium',
])

@php
    $sizes = [
        'large' => 'px-8 py-4',
        'medium' => 'px-6 py-3',
        'small' => 'px-4 py-2',
    ];
@endphp

<button
    {{ $attributes->merge([
        'class' => "
            inline-flex
            items-center
            justify-center
            gap-2.5
            rounded-full
            bg-yellow-normal
            font-body
            text-blue-darker
            transition-colors
            duration-200
            hover:bg-yellow-normal-hover
            active:bg-yellow-normal-active
            {$sizes[$size]}
        "
    ]) }}
>
    {{ $slot }}
</button>