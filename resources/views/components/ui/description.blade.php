@props(['value', 'dataSlot' => 'description'])

<div data-slot="{{ $dataSlot }}" {{ $attributes->merge(['class' => 'text-(--muted-foreground) text-sm']) }}>
    {{ $value ?? $slot }}
</div>
