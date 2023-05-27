<?php

use App\Http\Controllers\Cources\CourseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'courses'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/', [CourseController::class, 'store'])->name('courses.store');
    Route::post('/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{course}', [CourseController::class, 'delete'])->name('courses.delete');
});
