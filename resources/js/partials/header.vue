<template>
    <header class="header">
        <div class="content-container header__wrapper">
            <a href="/" class="header__logo link">ЛОГО.</a>
            <template v-if="!isAuth">
                <a href="/sign-in" class="header__auth link">Авторизация</a>
            </template>
            <template v-else>
                <a @click="logout" style="cursor: pointer" class="header__auth link">Выйти</a>
            </template>
        </div>
    </header>
</template>

<script setup lang="ts">
import user from "../store/modules/user";
import { ref } from "vue";

const userStore = user();

const isAuth = ref(userStore.isAuth);

const logout = () => {
    userStore.logout();
};
</script>

<style scoped>
</style>
