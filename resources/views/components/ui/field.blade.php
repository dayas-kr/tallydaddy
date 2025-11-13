@php
    $classes = implode(' ', [
        '*:data-[slot=control]:mt-2',
        '[&:has(input:disabled)>[data-slot=description]]:opacity-50',
        '[&>[data-slot=control]+[data-slot=description]]:mt-2',
        '[&:has(input:disabled)>label]:opacity-50',
    ]);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</div>
