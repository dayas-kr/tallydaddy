@props(['label' => '', 'name' => '', 'disabled' => false])

@php
    $switchClasses = implode(' ', [
        'peer inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent shadow-xs transition-all outline-none',
        'data-[state=checked]:bg-(--primary)',
        'data-[state=unchecked]:bg-(--input)',
        'dark:data-[state=unchecked]:bg-(--input)/80',
        'focus-visible:ring-[3px] focus-visible:border-(--ring) focus-visible:ring-(--ring)/50',
        'focus-visible:data-[state=checked]:border-(--primary)',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ]);

    $switchThumbClasses = implode(' ', [
        'block size-4 rounded-full ring-0 transition-transform pointer-events-none',
        'bg-(--background)',
        'dark:data-[state=unchecked]:bg-(--foreground)',
        'dark:data-[state=checked]:bg-(--primary-foreground)',
        'data-[state=checked]:translate-x-[calc(100%-2px)]',
        'data-[state=unchecked]:translate-x-0',
    ]);

    $switchLabelClasses = implode(' ', [
        'data-[disabled=true]:pointer-events-none',
        'peer-disabled:cursor-not-allowed',
        'peer-disabled:opacity-50',
        'cursor-pointer',
    ]);
@endphp


<div class="flex items-center space-x-2" x-data="{
    checked: false,
    disabled: {{ $disabled ? 'true' : 'false' }},
    get state() { return this.checked ? 'checked' : 'unchecked' },
    toggle() { if (!this.disabled) this.checked = !this.checked }
}">
    <input type="checkbox" role="switch" x-model="checked"
        {{ $attributes->merge(['name' => $name, 'class' => 'hidden']) }} :disabled="disabled">

    <button type="button" role="switch" @click="toggle" :disabled="disabled" :aria-checked="checked"
        :data-state="state" value="on" data-slot="switch" class="{{ $switchClasses }}">
        <span :data-state="state" data-slot="switch-thumb" class="{{ $switchThumbClasses }}">
        </span>
    </button>

    <x-ui.label @click="toggle" data-disabled="{{ $disabled ? 'true' : 'false' }}" class="{{ $switchLabelClasses }}">
        {{ $label }}
    </x-ui.label>
</div>
