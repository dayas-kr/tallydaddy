@props([
    'size' => 'default',
    'radius' => 'default',
    'type' => 'text',
    'disabled' => false,
])

@php
    // Define input-type
    $inputType = match ($type) {
        'text' => 'text',
        'password' => 'password',
        'email' => 'email',
        'url' => 'url',
        'search' => 'search',
        'tel' => 'tel',
        'number' => 'number',
        default => 'text',
    };

    // Define size-related classes.
    $sizeClasses = match ($size) {
        'extra-small' => 'text-xs h-7',
        'small' => 'text-sm h-9',
        'default' => 'text-sm h-10',
        'large' => 'text-base h-12',
        default => 'text-sm h-10',
    };

    // Define radius-related classes.
    $radiusClasses = match ($radius) {
        'none' => 'rounded-none',
        'large' => 'rounded-md',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $baseClasses = implode(' ', [
        $sizeClasses,
        $radiusClasses,
        'block',
        'py-2 px-3',
        'text-l-slate-12 dark:text-d-slate-12',
        'placeholder:text-(--muted-foreground)',
        'border focus:ring-[3px] focus:outline-none transition-ring duration-300',
        'bg-(--transparent)',
        'border-(--border)',
        'focus-visible:border-(--ring) focus-visible:ring-(--ring)/50',
        'disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50',
    ]);
@endphp


<input data-slot="control" type="{{ $inputType }}" data-ui="input" @disabled($disabled)
    {{ $attributes->merge(['class' => $baseClasses]) }} />
