@props(['for' => null])

@php
    $classes = implode(' ', [
        'relative w-fit',
        'flex items-center gap-2',
        'text-sm leading-none font-medium select-none',
        'data-[disabled=true]:opacity-50',
        '[&[data-required=true]_[data-slot=label-required-asterisk]]:block',
    ]);
@endphp

<label data-slot="label" {{ $attributes->merge(['for' => $for, 'class' => $classes]) }}>
    {{ $slot }}
    <span data-slot="label-required-asterisk" class="text-red-400 absolute -top-0.5 -right-2 hidden">*</span>
</label>
