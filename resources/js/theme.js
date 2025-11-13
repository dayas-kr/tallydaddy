class ThemeManager {
    constructor() {
        this.applyTheme();
        this.listen();
    }

    applyTheme() {
        const stored = localStorage.theme || "system";
        const actual =
            stored === "system"
                ? matchMedia("(prefers-color-scheme: dark)").matches
                    ? "dark"
                    : "light"
                : stored;

        document.documentElement.setAttribute("data-theme", actual);
        document.documentElement.className = actual;
    }

    setTheme(theme) {
        localStorage.theme = theme;
        this.applyTheme();
    }

    toggle() {
        const current = document.documentElement.getAttribute("data-theme");
        this.setTheme(current === "dark" ? "light" : "dark");
    }

    listen() {
        matchMedia("(prefers-color-scheme: dark)").addEventListener(
            "change",
            () => {
                if ((localStorage.theme || "system") === "system")
                    this.applyTheme();
            }
        );

        addEventListener(
            "storage",
            (e) => e.key === "theme" && this.applyTheme()
        );
    }
}

window.themeManager = new ThemeManager();
