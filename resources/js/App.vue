<template>
    <div>
        <Header/>
        <div class="page__content-wrap">
            <main class="page__content">
                <RouterView/>
            </main>
        </div>
        <Footer/>
    </div>
    <!--    <div>Vue!</div>-->

    <!--    <button @click="togglePopup">Покажи мне попап</button>-->

    <!--    <CommonPopup :is-visible="popupVisible" @close-popup="togglePopup">-->
    <!--        <div class="form">-->
    <!--            Раз раз я попап!-->
    <!--        </div>-->
    <!--    </CommonPopup>-->
    <!--    <div></div>-->
</template>


<script setup lang="ts">
// TypeScript enabled
import {ref} from 'vue'
import CommonPopup from "./vue/CommonPopup.vue";
import Header from "./partials/header.vue";
import Footer from "./partials/footer.vue";

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
