@props(['asChild' => false])

@if ($asChild)
    <div @click="openDialog" style="display: contents;" x-ref="triggerContainer">{{ $slot }}</div>
@else
    <x-ui.button variant="outline" @click="openDialog" x-ref="trigger">{{ $slot }}</x-ui.button>
@endif
