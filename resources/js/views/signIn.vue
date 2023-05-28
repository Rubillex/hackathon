<template>
    <div class="content-container">
        <div class="lk">
            <a href="/" class="lk__back link">&lt;- На главную</a>
            <template v-if="isLogin">
                <div class="lk__title">Вход</div>
                <div class="lk__block">
                    <label class="input-label">
                    <span class="input-label__text">
                        <span>Email:</span>
                    </span>

                        <input class="input" v-model="loginPayload.email">
                    </label>
                    <label class="input-label">
                    <span class="input-label__text">
                        <span>Пароль:</span>
                    </span>

                        <input class="input" type="password" v-model="loginPayload.password">
                    </label>
                </div>
                <button class="btn btn--green" @click="login">
                <span class="btn__text">
                    Войти
                </span>
                </button>
            </template>
            <template v-else>
                <div class="lk__title">Регистрация</div>
                <div class="lk__block">
                    <label class="input-label">
                    <span class="input-label__text">
                        <span>Имя:</span>
                    </span>

                        <input class="input" v-model="registerPayload.name">
                    </label>

                    <label class="input-label">
                    <span class="input-label__text">
                        <span>Email:</span>
                    </span>

                        <input class="input" v-model="registerPayload.email">
                    </label>
                    <label class="input-label">
                    <span class="input-label__text">
                        <span>Пароль:</span>
                    </span>

                        <input class="input" type="password" v-model="registerPayload.password">
                    </label>
                </div>
                <button class="btn btn--green" @click="regsiter">
                <span class="btn__text">
                    Зарегистрироваться
                </span>
                </button>
            </template>

            <span @click="changeForm" class="register" v-html="isLogin ? 'Регистрация' : 'Авторизация'"/>
        </div>
    </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import user from "../store/modules/user";

const userStore = user();

const loginPayload = ref({
    email: '',
    password: '',
});

const registerPayload = ref({
    name: '',
    email: '',
    password: '',
});

const login = () => {
    userStore.login(loginPayload.value);
};

const regsiter = () => {
    userStore.register(registerPayload.value);
};

const isLogin = ref(true);

const changeForm = () => {
    isLogin.value = !isLogin.value;
};

</script>
