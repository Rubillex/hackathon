<?php

use App\Http\Controllers\Cources\CourseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cources'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('cources.index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('cources.show');
    Route::post('/', [CourseController::class, 'store'])->name('cources.store');
    Route::post('/{cource}', [CourseController::class, 'update'])->name('cources.update');
    Route::delete('/{cource}', [CourseController::class, 'delete'])->name('cources.delete');
});
