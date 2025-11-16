@props(['orientation' => 'horizontal'])

@php
    $orientationValue = match ($orientation) {
        'horizontal' => 'horizontal',
        'vertical' => 'vertical',
        default => 'horizontal',
    };

    $orientationClasses = match ($orientation) {
        'horizontal'
            => '[&>*:not(:first-child)]:rounded-l-none [&>*:not(:first-child)]:border-l-0 [&>*:not(:last-child)]:rounded-r-none',
        'vertical'
            => 'flex-col [&>*:not(:first-child)]:rounded-t-none [&>*:not(:first-child)]:border-t-0 [&>*:not(:last-child)]:rounded-b-none h-fit',
    };

    $classes = implode(' ', [
        "flex w-fit items-stretch *:focus-visible:z-10 *:focus-visible:relative [&>[data-slot=select-trigger]:not([class*='w-'])]:w-fit [&>input]:flex-1 has-[select[aria-hidden=true]:last-child]:[&>[data-slot=select-trigger]:last-of-type]:rounded-r-md has-[>[data-slot=button-group]]:gap-2",
        $orientationClasses,
    ]);
@endphp

<div role="group" data-slot="button-group"
    {{ $attributes->merge(['data-orientation' => $orientationValue, 'class' => $classes]) }}>
    {{ $slot }}
</div>
