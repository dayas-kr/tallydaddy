<template x-teleport="body" data-teleport-template="true">
    <div>
        <div @click="closeAlertDialog" x-show="open" data-slot="dialog-overlay" class="fixed inset-0 z-50 bg-black/50"
            :aria-hidden="open ? 'false' : 'true'" style="pointer-events: auto"
            x-transition:enter="animate-in fade-in-0 duration-200 ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="animate-out fade-out-0 duration-150 ease-in"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div x-show="open" x-trap="open" role="alertdialog"
            :aria-labelledby="$refs.alertDialogTitle.textContent.trim()"
            :aria-describedby="$refs.alertDialogDesc.textContent.trim()" x-show="open" x-trap="open"
            data-slot="alert-dialog-content" :tabindex="open ? '-1' : '0'" style="pointer-events: auto"
            x-transition:enter="animate-in fade-in-0 zoom-in-95 duration-150 ease-out"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="animate-out fade-out-0 zoom-out-95 duration-150 ease-in"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="bg-(--background) data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-50 grid w-full max-w-[calc(100%-2rem)] translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border border-(--border) p-6 shadow-lg duration-200 sm:max-w-lg">
            {{ $slot }}
        </div>
    </div>
</template>
