import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { Link } from '@inertiajs/vue3';
import { route } from "ziggy-js";
import { ZiggyVue } from 'ziggy-js';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

//toastfication
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import '@mdi/font/css/materialdesignicons.css'

import "../css/app.css";
//bootstrap
import 'bootstrap/dist/css/bootstrap.css'

//toast
 import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";


//font awesome
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import { faFacebook,faYoutube } from '@fortawesome/free-brands-svg-icons'


import { faPlus,faEnvelope,faLocationDot,faPhone,faArrowUpFromBracket,faCircleXmark } from '@fortawesome/free-solid-svg-icons'

library.add(faPlus,faEnvelope,faFacebook,faLocationDot,faPhone,faYoutube,faArrowUpFromBracket,faCircleXmark)

const vuetify = createVuetify({
  components,
  directives,

  
})

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            app.component("Link", Link)
            .component("font-awesome-icon", FontAwesomeIcon)
            .use(plugin)
            .use(ToastPlugin)
            .use(ZiggyVue, Ziggy)
            .use(vuetify)
            .use(Toast)
            .config.globalProperties.$route = route
          app.mount(el);   
    },
});
