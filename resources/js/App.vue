<template>
    <div>Vue!</div>

    <button @click="togglePopup">Покажи мне попап</button>

    <CommonPopup :is-visible="popupVisible" @close-popup="togglePopup">
        <div class="form">
            Раз раз я попап!
        </div>
    </CommonPopup>
    <div></div>
</template>


<script setup lang="ts">
// TypeScript enabled
import { ref } from 'vue'
import CommonPopup from "./vue/CommonPopup.vue";

const popupVisible = ref(false);

const togglePopup = () => {
    popupVisible.value = !popupVisible.value;
};

const count = ref(1)
</script>

<style scoped>
 .form {
     width: 500px;
     height: 500px;
     background-color: red;
 }
</style>
