@props([
    'href' => '',
    'size' => '2',
    'variant' => 'primary',
    'color' => '',
    'radius' => 'medium',
    'disabled' => false,
])

@php
    // Normalize size input
    $size = match ($size) {
        'small', '1' => 'small',
        'medium', '2' => 'medium',
        'large', '3' => 'large',
        'extra-large', '4' => 'extra-large',
        'icon-sm', 'icon', 'icon-lg', 'icon-xl' => $size,
        default => 'medium',
    };

    // Size classes
    $sizeClasses =
        [
            'small' => 'text-xs px-2 h-6',
            'medium' => 'text-sm px-3 h-8',
            'large' => 'text-base px-4 h-10',
            'extra-large' => 'text-lg px-6 h-12',
            'icon-sm' => 'text-xs h-6 w-6 flex items-center justify-center',
            'icon' => 'text-sm size-8 flex items-center justify-center',
            'icon-lg' => 'text-base px-4 size-10 flex items-center justify-center',
            'icon-xl' => 'text-lg px-6 size-12 flex items-center justify-center',
        ][$size] ?? 'text-sm px-3 h-8';

    // Common styles (different for links vs buttons)
    $isLink = !empty($href);

    $commonBase = [
        'inline-flex',
        'items-center',
        'justify-center',
        'gap-2',
        'font-medium',
        'whitespace-nowrap',
        'transition-all',
    ];

    // Add disabled styles only for buttons
    if (!$isLink) {
        $commonBase[] = 'disabled:pointer-events-none';
        $commonBase[] = 'disabled:opacity-50';
    }

    // Add disabled styles for links
    if ($isLink && $disabled) {
        $commonBase[] = 'pointer-events-none';
        $commonBase[] = 'opacity-50';
    }

    $commonFocus = [
        'focus:outline-hidden',
        'focus-visible:border-(--ring)',
        'focus-visible:ring-(--ring)/50',
        'focus-visible:ring-[3px]',
    ];

    // Variant classes
    $variantClasses = match ($variant) {
        'primary' => implode(' ', [
            'bg-(--primary)',
            'hover:bg-(--primary)/90',
            'text-(--primary-foreground)',
            ...$commonFocus,
        ]),

        'outline' => implode(' ', [
            'bg-white dark:bg-(--input)/30',
            'hover:bg-(--accent) dark:hover:bg-(--input)/50',
            'text-(--accent-foreground) hover:text-(--accent-foreground)',
            'border border-(--border)',
            ...$commonFocus,
        ]),

        'secondary' => implode(' ', [
            'bg-(--secondary)',
            'hover:bg-(--secondary)/80',
            'text-(--secondary-foreground)',
            ...$commonFocus,
        ]),

        'ghost' => implode(' ', [
            'hover:bg-(--accent)',
            'dark:hover:bg-(--accent)/50',
            'hover:text-(--accent-foreground)',
            'text-(--accent-foreground)',
            ...$commonFocus,
        ]),

        'destructive' => implode(' ', [
            'bg-(--destructive)',
            'dark:bg-(--destructive)/60',
            'hover:bg-(--destructive)/90',
            'text-white',
            'focus:outline-hidden',
            'focus-visible:border-(--ring)',
            'focus-visible:ring-(--destructive)/20',
            'focus-visible:ring-[3px]',
        ]),

        'link' => implode(' ', [
            'outline-hidden',
            'focus-visible:border-(--ring)',
            'focus-visible:ring-(--ring)/50',
            'focus-visible:ring-[3px]',
            'text-(--primary)',
            'underline',
            'underline-offset-4',
        ]),

        default => implode(' ', [
            'bg-(--primary)]',
            'hover:bg-(--primary)/90',
            'text-(--primary-foreground)',
            ...$commonFocus,
        ]),
    };

    // Radius classes
    $radiusClasses =
        [
            'none' => 'rounded-none',
            'small' => 'rounded-xs',
            'medium' => 'rounded-md',
            'large' => 'rounded-lg',
            'full' => 'rounded-full',
        ][$radius] ?? 'rounded-xs';

    // Combine all classes
    $classes = implode(' ', [...$commonBase, $sizeClasses, $radiusClasses, $variantClasses]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
