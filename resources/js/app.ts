import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedState from 'pinia-plugin-persistedstate'

import App from './App.vue'

const pinia = createPinia();

pinia.use(piniaPluginPersistedState);

const appEl = document.querySelector('#vue-app');

if (appEl) {
    createApp(App)
        .use(pinia)
        .mount(appEl);
}



