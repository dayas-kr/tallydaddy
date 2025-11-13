@props(['value', 'disabled' => false])

@php
    $disabledClasses = $disabled ? 'text-zinc-400 dark:text-zinc-600' : 'text-zinc-600 dark:text-zinc-400';
@endphp

<div data-slot="description" {{ $attributes->merge(['class' => "text-sm {$disabledClasses}"]) }}>
    {{ $value ?? $slot }}
</div>
