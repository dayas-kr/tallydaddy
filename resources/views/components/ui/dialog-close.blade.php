@props(['asChild' => false])

@if ($asChild)
    <div @click="closeDialog" style="display: contents;">{{ $slot }}</div>
@else
    <x-ui.button variant="outline" @click="closeDialog">{{ $slot }}</x-ui.button>
@endif
