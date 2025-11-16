@props([
    'label' => '',
    'description' => '',
    'name' => '',
    'disabled' => false,
])

@php
    $checkboxClasses = implode(' ', [
        'peer',
        'size-4 shrink-0 rounded-sm border shadow-xs',
        'border-(--input) dark:bg-(--input)/30',
        'transition-shadow outline-none',
        'disabled:cursor-not-allowed disabled:opacity-50',
        // Checked
        'data-[state=checked]:bg-(--primary)',
        'data-[state=checked]:text-(--primary-foreground)',
        'dark:data-[state=checked]:bg-(--primary)',
        'data-[state=checked]:border-(--primary)',
        // Focus
        'focus-visible:ring-[3px] focus-visible:border-(--ring) focus-visible:ring-(--ring)/50',
        'aria-invalid:ring-(--destructive)/20 dark:aria-invalid:ring-(--destructive)/40 aria-invalid:border-(--destructive)',
    ]);

    $checkboxLabelClasses = implode(' ', [
        'data-[disabled=true]:cursor-not-allowed', // checkbox-specific
        'select-none mt-px',
    ]);

    $checkboxDescClasses = implode(' ', [
        'text-(--muted-foreground) text-sm',
        'data-[disabled=true]:pointer-events-none data-[disabled=true]:opacity-50',
    ]);
@endphp

<div class="flex items-start gap-3" x-data="{
    checked: false,
    disabled: {{ $disabled ? 'true' : 'false' }},
    get state() { return this.checked ? 'checked' : 'unchecked' },
    toggle() { if (!this.disabled) this.checked = !this.checked }
}">
    <input type="checkbox" role="checkbox" x-model="checked"
        {{ $attributes->merge(['name' => $name, 'class' => 'hidden']) }} :disabled="disabled">

    <button type="button" role="checkbox" @click="toggle" :aria-checked="checked ? 'true' : 'false'"
        :disabled="disabled" :data-state="state" value="on" data-slot="checkbox" class="{{ $checkboxClasses }}"
        id="terms-2">
        <span :data-state="state" x-show="checked" data-slot="checkbox-indicator"
            class="grid place-content-center text-current transition-none" style="pointer-events: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-check size-3.5">
                <path d="M20 6 9 17l-5-5"></path>
            </svg>
        </span>
    </button>

    <div class="grid gap-1.5">
        <x-ui.label @click="toggle" class="{{ $checkboxLabelClasses }}"
            data-disabled="{{ $disabled ? 'true' : 'false' }}">
            {{ $label }}
        </x-ui.label>
        @if ($description)
            <p class="{{ $checkboxDescClasses }}" data-disabled="{{ $disabled ? 'true' : 'false' }}">
                {{ $description }}
            </p>
        @endif
    </div>
</div>
