<template>
    <div class="progress-bar">
        <div class="progress-bar__status" :class="theme" :style="'width:' + percent + '%'"></div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
    theme: {
        type: String,
        default: 'green',
    },
    percent: {
        type: Number,
        default: 100
    }
});
</script>

<style scoped>

</style>
