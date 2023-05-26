<?php

use App\Http\Controllers\Cources\QuestionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'questions'], function () {
    Route::get('/{question}', [QuestionController::class, 'show'])->name('questions.show');
    Route::post('/', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/{question}', [QuestionController::class, 'delete'])->name('questions.delete');
});
