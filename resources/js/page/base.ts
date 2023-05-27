import initVue from "~/init-vue";
import test from '../vue/test.vue';

/**
 * Базовый контроллер страницы
 */
abstract class BasePage {
    readonly el: HTMLBodyElement | null = null;

    constructor(el: HTMLBodyElement | null) {
        if (el === null) {
            throw Error('Empty el parameter is not allowed');
        }

        this.el = el;

        this.initPopups();
        this.init();
    }

    init(): void {
        initVue(this.el?.querySelector('.vue-test'), test); // todo дописать попапы
    }

    initPopups() {
        // initVue(this.el?.querySelector('.vue-modals-container'), ModalContainer); // todo дописать попапы

        // this.el?.querySelectorAll('[data-popup]').forEach(link => {
        //     link.addEventListener('click', e => {
        //         const a = e.target as HTMLElement;
        //
        //         if (a.dataset && a.dataset.popup) {
        //             const popupType = a.dataset.popup as keyof typeof PopupMap;
        //
        //             const popupProps = JSON.parse(a.dataset.popupProps || '{}');
        //
        //             show(popupType, popupProps);
        //         }
        //     });
        // });
    }
}

export default BasePage;
