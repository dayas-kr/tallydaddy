@props(['orientation' => 'horizontal'])

@php
    $orientationValue = match ($orientation) {
        'horizontal' => 'horizontal',
        'vertical' => 'vertical',
        default => 'horizontal',
    };
@endphp

<div data-orientation="{{ $orientationValue }}" role="none" data-slot="separator"
    class="bg-(--border) shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px h-4!">
</div>
