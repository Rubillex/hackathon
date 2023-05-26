<?php

use App\Http\Controllers\Cources\CourceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cources'], function () {
    Route::get('/', [CourceController::class, 'index'])->name('cources.index');
    Route::get('/{slug}', [CourceController::class, 'show'])->name('cources.show');
    Route::post('/', [CourceController::class, 'store'])->name('cources.store');
    Route::post('/{cource}', [CourceController::class, 'update'])->name('cources.update');
    Route::delete('/{cource}', [CourceController::class, 'delete'])->name('cources.delete');
});
