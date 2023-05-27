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

                    <input class="input" v-model="id">
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
                <div class="popup-modal__title">Аккаунт добавлен</div>
                <div class="popup-modal__descr">Очков репутации: {{ reputation }}</div>
                <div class="popup-modal__descr">Очков знаний: {{ knowledge }}</div>
            </div>
        </div>
    </CommonPopup>
</template>

<script setup lang="ts">

    import {postJson} from "../helper/ajax";
    import CommonPopup from "../vue/CommonPopup.vue";
    import {ref} from "vue";
    import user from "../store/modules/user";

    const store = user();

    const userData = store.getUserData;

    const reputation = ref(0);
    const knowledge = ref(0);
    const popupVisible = ref(false);
    const id = ref(''); // todo из стора, а если есть, то дизейблим инпут

    const togglePopup = () => {
        popupVisible.value = !popupVisible.value;
    };

    async function send() {
        if (!userData || !userData.id) {
            return;
        }

        const response = await postJson<{success: boolean, knowledge: number, reputation: number}>('/api/platform/load', {id: id.value, userId: userData.id});

        reputation.value = response.reputation;
        knowledge.value = response.knowledge;

        if (response.success) {
            togglePopup();
        }
    }
</script>
