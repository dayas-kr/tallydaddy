<template x-teleport="body">
    <div>
        <div @click="closeDialog" x-show="open" data-slot="dialog-overlay" class="fixed inset-0 z-50 bg-black/50"
            :aria-hidden="open ? 'false' : 'true'" style="pointer-events: auto"
            x-transition:enter="animate-in fade-in-0 duration-200 ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="animate-out fade-out-0 duration-150 ease-in"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div x-ref="dialog" role="dialog" aria-modal="true" :aria-labelledby="$refs.dialogTitle.textContent.trim()"
            :aria-describedby="$refs.dialogDesc.textContent.trim()" x-show="open" x-trap="open"
            data-slot="dialog-content" :tabindex="open ? '-1' : '0'" style="pointer-events: auto"
            x-transition:enter="animate-in fade-in-0 zoom-in-95 duration-150 ease-out"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="animate-out fade-out-0 zoom-out-95 duration-150 ease-in"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="bg-(--background) fixed top-[50%] left-[50%] z-50 grid w-full max-w-[calc(100%-2rem)] translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border border-(--border) p-6 shadow-lg duration-150 sm:max-w-[425px] min-w-[400px]">

            {{ $slot }}

            <button @click="closeDialog" type="button" data-slot="dialog-close"
                class="ring-offset-(--background) focus:ring-(--ring) data-[state=open]:bg-accent data-[state=open]:text-(--muted-foreground) absolute top-4 right-4 rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:ring-2 focus:ring-offset-2 focus:outline-hidden disabled:pointer-events-none [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-x">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
                <span class="sr-only">Close</span>
            </button>
        </div>
    </div>
</template>
