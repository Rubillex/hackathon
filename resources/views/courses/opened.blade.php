@extends('layouts.app')
@section('content')
    <div class="content-container scrollable">
        <div class="courses__container">
            <div class="courses">
                <button class="btn btn--border-black btn--green">
                <span class="btn__text">
                    Открытые курсы
                </span>
                </button>

                <span class="courses__desc">
                Современные технологии достигли такого уровня, что высокое качество позиционных исследований позволяет выполнить важные задания по разработке экспериментов, поражающих по своей масштабности и грандиозности.
            </span>

                <div class="courses__list">
                    @foreach($courses as $course)
                        <x-course-card :course="$course" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
