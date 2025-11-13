@props(['defaultValue', 'name' => 'radio-group'])

@php
    $classes = implode(' ', [
        'grid gap-3',
        '**:data-[slot=label]:data-[disabled=true]:pointer-events-none',
        '**:data-[slot=label]:peer-disabled:cursor-not-allowed',
        '**:data-[slot=label]:peer-disabled:opacity-50',
    ]);
@endphp
<div x-data="{
    selected: '{{ $defaultValue }}',
    items: [],
    init() {
        this.$nextTick(() => {
            this.items = Array.from(this.$el.querySelectorAll('[role=radio]')).map(el => ({
                value: el.value,
                disabled: el.getAttribute('aria-disabled') === 'true',
                element: el
            }));
        });
    },
    getState(value) {
        return this.selected === value ? 'checked' : 'unchecked';
    },
    isChecked(value) {
        return this.selected === value;
    },
    select(value) {
        this.selected = value;
        $refs.hiddenInput.value = value;
    },
    getTabIndex(value) {
        return this.selected === value ? '0' : '-1';
    },
    handleKeydown(event) {
        if (!['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'].includes(event.key)) return;

        event.preventDefault();

        const enabledItems = this.items.filter(item => !item.disabled);
        if (enabledItems.length === 0) return;

        const currentIndex = enabledItems.findIndex(item => item.value === this.selected);
        let nextIndex;

        if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
            nextIndex = (currentIndex + 1) % enabledItems.length;
        } else {
            nextIndex = (currentIndex - 1 + enabledItems.length) % enabledItems.length;
        }

        this.select(enabledItems[nextIndex].value);

        this.$nextTick(() => {
            enabledItems[nextIndex].element.focus();
        });
    }
}" role="radiogroup" aria-required="false" dir="ltr" data-slot="radio-group"
    class="{{ $classes }}" tabindex="-1" style="outline: none;" @keydown="handleKeydown($event)">
    <input type="hidden" name="{{ $name }}" x-ref="hiddenInput" :value="selected">
    {{ $slot }}
</div>
