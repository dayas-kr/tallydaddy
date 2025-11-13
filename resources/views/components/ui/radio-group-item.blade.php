@props(['id', 'value', 'disabled' => false])

@php
    $classes = implode(' ', [
        'peer aspect-square size-4 shrink-0 rounded-full border shadow-xs',
        'border-(--input) text-(--primary) dark:bg-(--input)/30',
        'focus-visible:border-(--ring) focus-visible:ring-(--ring)/50 focus-visible:ring-[3px] outline-none',
        'aria-invalid:ring-(--destructive)/20 dark:aria-invalid:ring-(--destructive)/40 aria-invalid:border-(--destructive)',
        'transition-[color,box-shadow]',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ]);
@endphp

<button type="button" role="radio" :aria-checked="isChecked('{{ $value }}')"
    :data-state="getState('{{ $value }}')" value="{{ $value }}"
    @click="!{{ $disabled ? 'true' : 'false' }} && select('{{ $value }}')" data-slot="radio-group-item"
    aria-disabled="{{ $disabled ? 'true' : 'false' }}" class="{{ $classes }}" id="{{ $id }}"
    :tabindex="getTabIndex('{{ $value }}')" @disabled($disabled)>
    <span x-show="isChecked('{{ $value }}')" :data-state="getState('{{ $value }}')">
        <x-ui.radio-group-indicator />
    </span>
</button>
