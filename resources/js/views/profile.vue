<template>
    <div class="main-container">
        <div class="content-container main-container__wrapper">
            <div class="pet-block">
                <div class="pet-block__wrapper">
                    <div class="pet-block__title" v-html="`Приветствую, ${userData.name}!`" />
                    <div class="pet-block__row">
                        <div class="pet-block__pet-card">
                            <div class="pet-card">
                                <div class="pet-card__img">
                                    <img src="images/main/ava.png" alt="">
                                </div>
                                <div class="pet-card__name">Жаба Клава</div>
                                <div class="pet-card__info">
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="images/svg/life.svg" alt="">
                                        <progress-bar theme="red" :percent="lifePercent" />
                                    </div>
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="images/svg/exp.svg" alt="">
                                        <progress-bar theme="green" :percent="100" />
                                    </div>
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="images/svg/score.svg" alt="">
                                        <div class="pet-stat__value">322</div>
                                    </div>
                                </div>
                            </div>
                            <div class="life-changer">
                                <a @click="decrementLife" class="pet-block__btn btn btn--red btn--border-black untouchable">
                                    <div class="menu__item-text btn__text">-</div>
                                </a>
                                <a @click="incrementLife" class="pet-block__btn btn btn--red btn--border-black untouchable">
                                    <div class="menu__item-text btn__text">+</div>
                                </a>
                            </div>
                        </div>
                        <div class="pet-block__info">
                            <div class="pet-block__info-title">Жаба Клава говорит:</div>
                            <div class="pet-block__messenger">
                                <message
                                    v-for="message in messages"
                                    :key="message.time"
                                    :message="message"
                                />
                            </div>
                            <a href="/courses" class="pet-block__btn btn btn--red btn--border-black">
                                <div class="menu__item-text btn__text">Накормить жабу</div>
                            </a>
                            <div class="pet-block__info-title">Мои последние курсы:</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-block">
                <div class="menu-block__wrapper">
                    <div class="menu-block__title">Меню</div>
                    <div class="menu-block__list menu">
                        <a href="/courses" class="menu__item btn btn--red btn--border-white">
                            <div class="menu__item-text btn__text">Открытые курсы</div>
                        </a>
                        <div class="menu__item btn btn--green btn--border-white">
                            <div class="menu__item-text btn__text">Мои курсы</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ProgressBar from "../components/ProgressBar.vue";
import { ref } from "vue";
import user from "../store/modules/user";
import Message from "../components/Message.vue";

const lifePercent = ref(100);

const store = user();

const userData = store.getUserData;

const messages = ref([
    {
        content: 'Я жрать блин хочу',
        time: '11.12.2023',
        incoming: true,
    },
    {
        content: 'прасти :с',
        time: '11.12.2023',
        incoming: false,
    },
]);

const decrementLife = () => {
    if (lifePercent.value <= 0) {
        return;
    }

    lifePercent.value = lifePercent.value - 5;
};

const incrementLife = () => {
    if (lifePercent.value >= 100) {
        return;
    }

    lifePercent.value = lifePercent.value + 5;
};
</script>

<style scoped lang="scss">
.life-changer {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    gap: 20px;

    padding-top: 20px;
}
</style>
