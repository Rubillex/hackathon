<template>
    <div>
        <template v-if="!isMobile">
            <Header/>
            <div class="page__content-wrap">
                <main class="page__content">
                    <RouterView/>
                </main>
            </div>
            <Footer/>
        </template>
        <template v-else>
           <div class="mobile">
               <span class="mobile__text">Мобильная и планшетная версия не поддерживаются :с</span>
           </div>
        </template>
    </div>
</template>


<script setup lang="ts">
// TypeScript enabled
import {ref} from 'vue'
import Header from "./partials/header.vue";
import Footer from "./partials/footer.vue";

const isMobile = ref(false);

isMobile.value = window.innerWidth <= 1024;

const popupVisible = ref(false);

const togglePopup = () => {
    popupVisible.value = !popupVisible.value;
};

const count = ref(1)
</script>

<style scoped lang="scss">
.form {
    width: 500px;
    height: 500px;
    background-color: red;
}
</style>
