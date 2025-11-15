<div x-data="{
    open: false,
    trigger: null,
    openDialog() { this.open = true },
    closeDialog() { this.open = false },
    init() {
        this.$watch('open', v => {
            this.$lockScroll(v)
            if (this.t) this.t.setAttribute('aria-expanded', v);
        });
        this.$nextTick(() => (
            this.t = this.$refs.triggerContainer?.querySelector('button') || this.$refs.trigger,
            this.t?.setAttribute('aria-haspopup', 'dialog'),
            this.t?.setAttribute('aria-expanded', this.open)
        ))
    },
}" @keydown.escape.window="closeDialog">
    {{ $slot }}
</div>
