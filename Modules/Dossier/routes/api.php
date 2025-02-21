<?php

use Illuminate\Support\Facades\Route;
use Modules\Dossier\Http\Controllers\DossierController;
use Modules\Dossier\Http\Controllers\EmailController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('dossier', DossierController::class)->names('dossier');

});


Route::group(['prefix' => 'dossier', 'as' => 'dossier.', 'namespace' => 'Modules\Dossier\Http\Controllers'], function () {
    Route::post('/send-mail', [EmailController::class, 'send'])->name('send-mail');
});
