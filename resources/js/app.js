import './bootstrap'
import '../css/app.css'
import 'aos/dist/aos.css' // You can also use <link> for styles
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import AOS from 'aos'

const appName = import.meta.env.VITE_APP_NAME || 'Holiday Booking'

createInertiaApp({
    title: (title) => `${title} ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(AOS.init())
            .mount(el)
    },
    progress: {
        color: '#4B5563',
    },
})
