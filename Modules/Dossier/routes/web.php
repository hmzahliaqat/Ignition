<?php

use Illuminate\Support\Facades\Route;
use Modules\Dossier\Http\Controllers\DossierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('dossier', DossierController::class)->names('dossier');
});
