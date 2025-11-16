@props(['align' => 'inline-start'])

@php
    $classes = match ($align) {
        'inline-start' => 'justify-center order-first pl-3 has-[>button]:ml-[-0.45rem] has-[>kbd]:ml-[-0.35rem]',
        'inline-end' => 'justify-center order-last pr-3 has-[>button]:mr-[-0.45rem] has-[>kbd]:mr-[-0.35rem]',
        'block-start'
            => 'justify-between order-first px-3 pt-3 [.border-b]:pb-3 w-full group-has-[>input]/input-group:pt-2.5',
        'block-end' => 'justify-between px-3 pb-3 [.border-t]:pt-3 w-full group-has-[>input]/input-group:pb-2.5',
    };
@endphp

<div role="group" data-slot="input-group-addon" data-align="{{ $align }}"
    class="text-(--muted-foreground) flex h-auto cursor-text items-center gap-2 py-1.5 text-sm font-medium select-none [&>svg:not([class*='size-'])]:size-4 [&>kbd]:rounded-[calc(var(--radius)-5px)] group-data-[disabled=true]/input-group:opacity-50 {{ $classes }}">
    {{ $slot }}
</div>
