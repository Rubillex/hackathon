@extends('layouts.app')
@section('content')
    <div class="main-container">
        <div class="content-container main-container__wrapper">
            <div class="pet-block">
                <div class="pet-block__wrapper">
                    <div class="pet-block__title">Приветствую, Фиона!</div>
                    <div class="pet-block__row">
                        <div class="pet-block__pet-card">
                            <div class="pet-card">
                                <div class="pet-card__img">
                                    <img src="{{ P_IMAGES . '/main/ava.png' }}" alt="">
                                </div>
                                <div class="pet-card__name">Жаба Клава</div>
                                <div class="pet-card__info">
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="{{ P_IMAGES . '/svg/life.svg' }}" alt="">
                                        <div class="pet-stat__value">3/3</div>
                                    </div>
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="{{ P_IMAGES . '/svg/exp.svg' }}" alt="">
                                        <div class="pet-stat__value">404/500</div>
                                    </div>
                                    <div class="pet-stat">
                                        <img class="pet-stat__svg" src="{{ P_IMAGES . '/svg/score.svg' }}" alt="">
                                        <div class="pet-stat__value">322</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pet-block__info">
                            <div class="pet-block__info-title">Жаба Клава говорит:</div>
                            <br>
                            <div class="pet-block__info-message">Я жрать блин хочу че ты меня не кормишь? Покорми старую, сынок... Я скоро совсем зачахну</div>
                            <br>
                            <div class="pet-block__info-date">27.05.2023</div>
                            <br>
                            <a href="{{ route('courses.index') }}" class="pet-block__btn btn btn--red btn--border-black">
                                <div class="menu__item-text btn__text">Накормить жабу</div>
                            </a>
                            <br>
                            <div class="pet-block__info-title">Мои последние курсы:</div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-block">
                <div class="menu-block__wrapper">
                    <div class="menu-block__title">Меню</div>
                    <div class="menu-block__list menu">
                        <a href="{{ route('courses.index') }}" class="menu__item btn btn--red btn--border-white">
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
@endsection
