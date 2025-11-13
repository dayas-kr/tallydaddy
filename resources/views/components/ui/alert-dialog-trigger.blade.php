@props(['asChild' => false])

@if ($asChild)
    <div @click="open = true" style="display: contents;">{{ $slot }}</div>
@else
    <x-ui.button variant="outline" @click="open = true">{{ $slot }}</x-ui.button>
@endif
