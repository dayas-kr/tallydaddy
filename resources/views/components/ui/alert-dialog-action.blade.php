@props(['asChild' => false])

@if ($asChild)
    <div @click="openDialog" style="display: contents;">{{ $slot }}</div>
@else
    <x-ui.button data-slot="alert-dialog-action" {{ $attributes }}>{{ $slot }}</x-ui.button>
@endif
