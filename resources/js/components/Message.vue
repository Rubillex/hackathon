<template>
    <div class="message" :class="{ incoming: message?.incoming }">
        <div class="message__block" v-html="message?.content" />
        <span class="message__time" v-html="message?.time" />
    </div>
</template>

<script setup lang="ts">

import {PropType} from "vue";

interface IMessage {
    content: string,
    time: string,
    incoming: boolean
}

const props = defineProps({
    message: Object as PropType<IMessage>
});
</script>

<style scoped>
</style>
