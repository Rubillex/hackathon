<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Con;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/platform')->name('platform.')->group(function () {
    Route::get('', [Con\Integration\PlatformController::class, 'loadUserPlatformInfo'])->name('loadUserPlatformInfo');
});

Route::prefix('/lk/')->name('lk.')->group(function () {
    Route::get('user', [Con\LK\LKController::class, 'index'])->name('index');
});

Route::post('/froggy-chat', [Con\API\ChatGPTController::class, 'sendMessage']);

Route::prefix('/pet')->name('pet.')->group(function () {
    // todo мидлвара на проверку авторизации, того что пет принадлежит юзеру
    Route::get('/get-pet-by-user/{user}', [Con\Api\PetController::class, 'getUserPet'])->name('getUserPet');
});
