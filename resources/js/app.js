import "./bootstrap";
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

Alpine.plugin(focus);
window.Alpine = Alpine;

// Add the lockScroll magic helper
Alpine.magic("lockScroll", () => {
    return (isOpen, transitionDuration = 150) => {
        if (isOpen) {
            const scrollbarWidth =
                window.innerWidth - document.documentElement.clientWidth;
            document.body.style.paddingRight = scrollbarWidth + "px";
            document.body.style.overflow = "hidden";
        } else {
            setTimeout(() => {
                document.body.style.paddingRight = "";
                document.body.style.overflow = "";
            }, transitionDuration);
        }
    };
});

Alpine.start();
