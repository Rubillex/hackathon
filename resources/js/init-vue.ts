import {Component, createApp} from 'vue';
import * as store from '~/store/index';
import { createPinia } from 'pinia';


const storePinia = createPinia();

function mount(vueEl: HTMLElement | null | undefined, component: Component) {
    if (!vueEl) return;

    // Переданные пропсы
    const props = JSON.parse(vueEl.dataset.vue || '{}');

    const app = createApp(component, props);

    /* region Глобальные компоненты */

    /* endregion */


    app.use(storePinia);

    /* region Initial store state */
    if (vueEl.dataset && vueEl.dataset.pinia) {
        const piniaStore = JSON.parse(vueEl.dataset.pinia);

        for (const piniaStoreKey in piniaStore) {
            if (!store[piniaStoreKey]) continue;

            const piniaStoreItem = store[piniaStoreKey]();

            if (!piniaStoreItem['initialState']) continue;
            piniaStoreItem.initialState(piniaStore[piniaStoreKey]);
        }
    }
    /* endregion */

    const componentContainer = document.createElement(vueEl.tagName);

    componentContainer.className = vueEl.className;

    vueEl.replaceWith(componentContainer);

    app.mount(componentContainer);
}

export default function initVue(vueEl: Element | NodeList | null | undefined, component: Component) {

    if (NodeList.prototype.isPrototypeOf(vueEl as object)) {
        Array.prototype.forEach.call(vueEl, el => {
            mount(el, component);
        });
    } else {
        mount(vueEl as HTMLElement, component);
    }
}
