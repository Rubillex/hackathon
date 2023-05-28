<template>
    <div class="main-container">
        <div class="content-container main-container__wrapper">
            <div class="pet-block">
                <div class="pet-block__wrapper">
                    <div class="pet-block__title" v-html="`Приветствую, ${userData.name}!`" />
                    <div class="pet-block__row">
                        <div class="pet-block__pet-card">
                            <div class="pet-card" :class="{'pet-card--dead': lifePercent === 0}">
                                <div class="pet-card__img">
                                    <img :src="getAvatar()" alt="avatar">
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
                                        <div class="pet-stat__value" v-text="knowledge" />
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-block">
                <div class="menu-block__wrapper">
                    <div class="menu-block__title">Меню</div>
                    <div class="menu-block__list menu">
                        <a href="/lk" class="menu__item btn btn--green btn--border-white">
                            <div class="menu__item-text btn__text">Профиль</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ProgressBar from "../components/ProgressBar.vue";
import {onMounted, ref} from "vue";
import user from "../store/modules/user";
import Message from "../components/Message.vue";
import {getJson} from "../helper/ajax";

const lifePercent = ref(100);

const store = user();

const userData = store.getUserData;

let knowledge = ref(0);

if (userData && userData.knowledge) {
    knowledge.value = userData.knowledge;
}

const messages = ref([
    {
        content: '*Думает*',
        time: '',
        incoming: true,
    },
]);


onMounted(async () => {
    const response = await getJson<{
        messageChat?: string,
    }>('/api/froggy-chat');

    if (!response.messageChat) {
        messages.value = [
            {
                content: 'Я жрать блин хочу че ты меня не кормишь? Покорми старую, сынок... Я скоро совсем зачахну',
                time: '28.05.2023',
                incoming: true,
            }
        ];

        return;
    }

    messages.value = [
        {
            content: response.messageChat,
            time: '28.05.2023',
            incoming: true,
        }
    ];
});

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

const getAvatar = () => {
    if (lifePercent.value > 80) {
        return '/images/main/happy.png';
    }
    if (lifePercent.value <= 0) {
        return '/images/main/die.png';
    }
    return '/images/main/normal.png';
}
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
