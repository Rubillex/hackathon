<?php

use App\Http\Controllers\Cources\LessonController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'lessons'], function () {
    Route::get('/', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/{slug}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/', [LessonController::class, 'store'])->name('lessons.store');
    Route::post('/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/{lesson}', [LessonController::class, 'delete'])->name('lessons.delete');
});
