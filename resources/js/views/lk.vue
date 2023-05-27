<template>
    <div class="content-container">
        <div class="lk">
            <a href="/" class="lk__back link">&lt;- На главную</a>
            <div class="lk__title">Интеграция с платформой</div>
            <div class="lk__block">
                <label class="input-label">
                    <span class="input-label__text">
                        <span>Введите id пользователя на stepik:</span>
                    </span>

                    <input class="input">
                </label>
            </div>
            <button class="btn btn--green" @click="send()">
                <span class="btn__text">
                    Отправить
                </span>
            </button>
        </div>
    </div>

    <CommonPopup :is-visible="popupVisible" @close-popup="togglePopup">
        <div class="popup-modal-wrapper">
            <div class="popup-modal">
                <div class="popup-modal__close" @click="togglePopup">x</div>
                <div class="popup-modal__title">popup</div>
            </div>
        </div>
    </CommonPopup>
</template>

<script setup lang="ts">

    import {postJson} from "~/helper/ajax";
    import CommonPopup from "../vue/CommonPopup.vue";
    import {ref} from "vue";

    const popupVisible = ref(false);

    const togglePopup = () => {
        popupVisible.value = !popupVisible.value;
    };

    async function send() {
        togglePopup();

        // const response = await postJson<{success: boolean}>('/platform/load', {id: }); todo
        //
        // if (response.success) {
        //     this.suggests = response.data!.suggests;
        // }
    }
// const id = ; todo из стора, а если есть, то дизейблим инпут
</script>
