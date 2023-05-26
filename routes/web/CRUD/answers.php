<?php

use App\Http\Controllers\Cources\AnswerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'answers'], function () {
    Route::post('/', [AnswerController::class, 'store'])->name('answers.store');
});
