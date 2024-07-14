import "./bootstrap";
import "./uikit.min.js";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import { modal } from "momentum-modal";
import ClickOutside from "@/Utillities/ClickOutsideDirective.js";
const appName = import.meta.env.VITE_APP_NAME || "Laravel";
import mitt from "mitt";
import Toast, { POSITION } from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const eventBus = mitt();

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toast, {
                position: POSITION.BOTTOM_CENTER,
            })
            .directive("click-outside", ClickOutside)
            .provide("eventBus", eventBus)
            .use(modal, {
                resolve: (name) =>
                    resolvePageComponent(
                        `./Pages/${name}.vue`,
                        import.meta.glob("./Pages/**/*.vue"),
                    ),
            })
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
