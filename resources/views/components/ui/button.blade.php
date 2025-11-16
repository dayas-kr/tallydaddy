@props([
    'type' => 'button',
    'variant' => 'default',
    'size' => 'default',
    'radius' => 'lg',
    'dataSlot' => 'button',
])

@php
    $variantValue = match ($variant) {
        'outline', 'ghost', 'destructive', 'secondary', 'link' => $variant,
        default => 'default',
    };

    $sizeValue = match ($size) {
        'sm', 'lg', 'icon', 'icon-sm', 'icon-lg' => $size,
        default => 'default',
    };

    $radiusValue = match ($radius) {
        'none', 'sm', 'lg', 'full' => $radius,
        default => 'default',
    };

    $variantClass = match ($variantValue) {
        'default' => 'bg-(--primary) text-(--primary-foreground) hover:bg-(--primary)/90',
        'outline' => implode(' ', [
            'bg-(--background) dark:bg-(--input)/30',
            'border border-(--border) dark:border-(--input)',
            'hover:bg-(--accent) dark:hover:bg-(--input)/50',
            'shadow-xs hover:text-(--accent-foreground)',
        ]),
        'ghost' => 'hover:bg-(--accent) hover:text-(--accent-foreground) dark:hover:bg-(--accent)/50',
        'destructive' => implode(' ', [
            'text-white',
            'bg-(--destructive) dark:bg-(--destructive)/60',
            'hover:bg-(--destructive)/90',
        ]),
        'secondary' => 'bg-(--secondary) text-(--secondary-foreground) hover:bg-(--secondary)/80',
        'link' => 'text-(--primary) underline-offset-4 hover:underline',
    };

    $sizeClass = match ($sizeValue) {
        'sm' => 'h-8 gap-1.5 px-3 has-[>svg]:px-2.5',
        'default' => 'h-9 gap-2 px-4 py-2 has-[>svg]:px-3',
        'lg' => 'h-10 gap-2 px-6 has-[>svg]:px-4',
        'icon' => 'size-9',
        'icon-sm' => 'size-8',
        'icon-lg' => 'size-10',
    };

    $radiusClass = match ($radiusValue) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'default' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    };

    $focusClass = match ($variantValue) {
        'destructive' => 'focus-visible:ring-(--destructive)/20 dark:focus-visible:ring-(--destructive)/40',
        default => 'focus-visible:ring-(--ring)/50',
    };

    $classes = implode(' ', [
        'inline-flex items-center justify-center',
        'whitespace-nowrap',
        'text-sm font-medium',
        'transition-all',
        '[&_svg]:pointer-events-none [&_svg:not([class*="size-"])]:size-4 [&_svg]:shrink-0',
        'shrink-0 outline-none',
        'aria-invalid:ring-(--destructive)/20 dark:aria-invalid:ring-(--destructive)/40 aria-invalid:border-(--destructive)',
        'focus-visible:border-(--ring) focus-visible:ring-[3px]',
        'disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed',
        $variantClass,
        $sizeClass,
        $radiusClass,
        $focusClass,
    ]);
@endphp

<button {{ $attributes->merge(['type' => $type, 'data-slot' => $dataSlot, 'class' => $classes]) }}>
    {{ $slot }}
</button>
