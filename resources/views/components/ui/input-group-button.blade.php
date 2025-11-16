@props([
    'type' => 'button',
    'variant' => 'default',
    'size' => 'xs',
    'radius' => 'default',
])

@php
    $variantValue = match ($variant) {
        'outline', 'ghost', 'secondary' => $variant,
        default => 'default',
    };

    $radiusClass = match ($radius) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $sizeClass = match ($size) {
        'xs' => 'h-6 py-2 px-2 gap-1',
        'icon-xs' => 'size-6 p-0 has-[>svg]:p-0',
        'sm' => 'h-8 py-2 px-2.5 has-[>svg]:px-2.5 gap-1.5',
        'icon-sm' => 'size-8 p-0 has-[>svg]:p-0',
        default => 'h-8 py-2 px-2.5 has-[>svg]:px-2.5 gap-1.5',
    };

    $variantClass = match ($variantValue) {
        'ghost' => 'hover:bg-(--accent) hover:text-(--accent-foreground) dark:hover:bg-(--accent)/50',
        'outline'
            => 'border bg-(--background) dark:bg-(--input)/30 dark:border-(--input) hover:bg-(--accent) hover:text-(--accent-foreground) dark:hover:bg-(--input)/50',
        'secondary' => 'bg-(--secondary) text-(--secondary-foreground) hover:bg-(--secondary)/80',
        'default' => 'bg-(--primary) text-(--primary-foreground) hover:bg-(--primary)/90',
    };

    $classes = implode(' ', [
        "justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-(--ring) focus-visible:ring-(--ring)/50 focus-visible:ring-[3px] aria-invalid:ring-(--destructive)/20 dark:aria-invalid:ring-(--destructive)/40 aria-invalid:border-(--destructive) text-sm shadow-none flex items-center",
        $variantClass,
        $sizeClass,
        $radiusClass,
    ]);
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>{{ $slot }}</button>
