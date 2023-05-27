<template>
    <div class="content-container scrollable">
        <div class="courses__container">
            <div class="courses">
                <button class="btn btn--border-black btn--green">
                <span class="btn__text">
                    Открытые курсы
                </span>
                </button>

                <span class="courses__desc">
                Современные <b>технологии</b> достигли такого уровня, что высокое качество позиционных исследований позволяет выполнить важные задания по <i>разработке экспериментов</i>, поражающих по своей масштабности и грандиозности.
            </span>

                <div class="courses__list">
                    <course-card
                        v-for="cource in cources"
                        :data="cource"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import CourseCard from "../components/CourseCard.vue";
import {ref} from "vue";

const cources = ref([]);
</script>

<style scoped lang="scss">

</style>
