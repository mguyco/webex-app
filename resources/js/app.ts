import '../css/app.css';
import './bootstrap';

import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import vuetify from './plugins/vuetify';
import UserLayout from './layouts/UserLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue'));
        
        page.then((module) => {
            module.default.layout = module?.default?.layout ?? UserLayout;
        });
      
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .use(ZiggyVue)
            .use(vuetify)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
