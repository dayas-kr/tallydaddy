@php
    $classes = implode(' ', [
        'w-full min-w-0 h-9 px-3 py-1 rounded-md',
        'bg-transparent dark:bg-(--input)/30',
        'border border-(--input) shadow-xs',
        'text-base md:text-sm',
        'transition-[color,box-shadow] outline-none',
        'file:inline-flex file:h-7 file:bg-transparent file:text-sm file:font-medium file:text-(--foreground) file:border-0',
        'placeholder:text-(--muted-foreground)',
        'selection:bg-(--primary) selection:text-(--primary-foreground)',
        'focus-visible:border-(--ring)',
        'focus-visible:ring-(--ring)/50 focus-visible:ring-[3px]',
        'aria-invalid:border-(--destructive)',
        'aria-invalid:ring-(--destructive)/20 dark:aria-invalid:ring-(--destructive)/40',
        'disabled:cursor-not-allowed disabled:pointer-events-none disabled:opacity-50',
    ]);
@endphp

<input {{ $attributes->merge(['class' => $classes]) }}>
