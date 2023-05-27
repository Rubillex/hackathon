import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedState from 'pinia-plugin-persistedstate'

import test from './test.vue'

const pinia = createPinia();

pinia.use(piniaPluginPersistedState);

const appEl = document.querySelector('#vue-app');

if (appEl) {
    createApp(test)
        .use(pinia)
        .mount(appEl);
}



