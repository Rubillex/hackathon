@extends('layouts.app')
@section('content')
    <div class="main-container">
        <div class="pet-block">
            <div class="content-container pet-block__wrapper">
                <div class="pet-block__title">Приветствую, Фиона!</div>
                <div class="pet-block__pet-card">
                    <div class="pet-card">

                    </div>
                </div>
                <div class="pet-block__info">

                </div>
            </div>
        </div>
        <div class="menu-block">
            <div class="content-container menu-block__wrapper">
                <div class="menu-block__title">Меню</div>
                <div class="menu-block__list menu">
                    <div class="menu__item menu__item--red">
                        <div class="menu__item-text">Мои курсы</div>
                    </div><br><br>
                    <div class="menu__item btn btn--red btn--border-white">
                        <div class="menu__item-text btn__text">Открытые курсы</div>
                    </div><br><br>
                    <div class="menu__item btn btn--green btn--border-black">
                        <div class="menu__item-text btn__text">Открытые курсы</div>
                    </div><br><br>
                    <div class="menu__item btn btn--blue">
                        <div class="menu__item-text btn__text">Открытые курсы</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
