@props(['asChild' => false])

@if ($asChild)
    <div @click="openAlertDialog" style="display: contents;" x-ref="triggerContainer">{{ $slot }}</div>
@else
    <x-ui.button variant="outline" @click="openAlertDialog" x-ref="trigger">{{ $slot }}</x-ui.button>
@endif
