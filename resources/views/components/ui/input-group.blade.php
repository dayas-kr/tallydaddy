@props(['radius' => 'lg'])

@php
    $radiusClass = match ($radius) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $classes = implode(' ', [
        $radiusClass,
        'relative flex w-full items-center min-w-0 h-9',
        'border border-(--input) dark:bg-(--input)/30 shadow-xs outline-none',
        'transition-[color,box-shadow]',
        'group/input-group',

        'has-[>textarea]:h-auto',
        'has-[>[data-align=inline-start]]:[&>input]:pl-2',
        'has-[>[data-align=inline-end]]:[&>input]:pr-2',

        'has-[>[data-align=block-start]]:h-auto',
        'has-[>[data-align=block-start]]:flex-col',
        'has-[>[data-align=block-start]]:[&>input]:pb-3',

        'has-[>[data-align=block-end]]:h-auto',
        'has-[>[data-align=block-end]]:flex-col',
        'has-[>[data-align=block-end]]:[&>input]:pt-3',

        'has-[[data-slot=input-group-control]:focus-visible]:border-(--ring)',
        'has-[[data-slot=input-group-control]:focus-visible]:ring-(--ring)/50',
        'has-[[data-slot=input-group-control]:focus-visible]:ring-[3px]',

        'has-[[data-slot][aria-invalid=true]]:border-(--destructive)',
        'has-[[data-slot][aria-invalid=true]]:ring-(--destructive)/20',
        'dark:has-[[data-slot][aria-invalid=true]]:ring-(--destructive)/40',
    ]);
@endphp

<div data-slot="input-group" role="group" class="{{ $classes }}">
    {{ $slot }}
</div>
