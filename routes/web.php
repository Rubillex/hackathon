<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //TODO КОСТЫЛЬ ДЛЯ ДЕБАГА
    auth()->loginUsingId(1, true);
    return view('index');
})->name('index');

Route::group([/*'middleware' => 'auth'*/], function () {
    require __DIR__ . '/web/CRUD/courses.php';
    require __DIR__ . '/web/CRUD/lessons.php';
    require __DIR__ . '/web/CRUD/questions.php';
    require __DIR__ . '/web/CRUD/answers.php';
});
