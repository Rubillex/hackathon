<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpaController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', [SpaController::class, 'index'])->where('any', '.*');

Route::get('/', [ProfileController::class, 'profile'])->name('index');

Route::group([/*'middleware' => 'auth'*/], function () {
    require __DIR__ . '/web/CRUD/courses.php';
    require __DIR__ . '/web/CRUD/lessons.php';
    require __DIR__ . '/web/CRUD/questions.php';
    require __DIR__ . '/web/CRUD/answers.php';
});
