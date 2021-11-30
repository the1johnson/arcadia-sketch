<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ArcadeController;
use App\Http\Controllers\PlayLogController;
use App\Http\Controllers\ArcadeLocationController;
use App\Http\Controllers\ArcadeLocationGameController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/addArcade', [ArcadeController::class, 'store']);
Route::get('/arcadeNameSearch', [ArcadeController::class, 'name_search']);

Route::post('/addArcadeLocation', [ArcadeLocationController::class, 'store']);

Route::post('/addGame', [GameController::class, 'store']);
Route::get('/gameNameSearch', [GameController::class, 'name_search']);

Route::post('/addArcadeLocationGame', [ArcadeLocationGameController::class, 'store']);

Route::post('/addPlayLogs', [PlayLogController::class, 'store']);
Route::get('/claimNotebookPayouts', [PlayLogController::class, 'claim_notebook_plays'])
    ->name('claimNotebookPayouts');

require __DIR__.'/auth.php';
