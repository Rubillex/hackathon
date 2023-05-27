<template>
    <div class="popup" v-if="isVisible">
        <div class="popup__wrapper">
            <div class="popup__content js-close-popup" @click="closePopup">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
const emit = defineEmits(['close-popup']);
const props = defineProps({
    isVisible: {
        type: Boolean,
        default: false,
    }
});

const closePopup = (ev) => {
    if (ev.target.classList.contains('js-close-popup')) {
        emit('close-popup');
    }
}
</script>

<style lang="scss" scoped>
.popup {
    position: absolute;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    z-index: 10000;

    &__wrapper {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    &__content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
}
</style>
