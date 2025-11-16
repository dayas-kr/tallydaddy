@props(['orientation' => 'horizontal'])

@php
    $orientationValue = match ($orientation) {
        'horizontal' => 'horizontal',
        'vertical' => 'vertical',
        default => 'horizontal',
    };
@endphp

<div data-orientation="{{ $orientationValue }}" role="none" data-slot="button-group-separator"
    class="shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:w-px bg-(--input) relative m-0! self-stretch data-[orientation=vertical]:h-auto">
</div>
