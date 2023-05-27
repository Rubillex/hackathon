<template>
    <div class="content-container">
        <div class="lk">
            <a href="/" class="lk__back link">&lt;- На главную</a>
            <div class="lk__title">Регистрация</div>
            <div class="lk__block">
                <label class="input-label">
                    <span class="input-label__text">
                        <span>Email:</span>
                    </span>

                    <input class="input" name="email">
                </label>
                <label class="input-label">
                    <span class="input-label__text">
                        <span>Пароль:</span>
                    </span>

                    <input class="input" name="password">
                </label>
            </div>
            <button class="btn btn--green">
                <span class="btn__text">
                    Зарегистрироваться
                </span>
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
</script>
