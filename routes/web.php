<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VarietatController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\FamilieController;
use App\Http\Controllers\MunicipiController;
use App\Http\Controllers\ProvincieController;
use App\Http\Controllers\PersoneController;
use App\Http\Controllers\MultiplicadorController;
use App\Http\Controllers\MostreController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\PackController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resources([
        'varietats' => VarietatController::class,
        'especies' => EspecieController::class,
        'families' => FamilieController::class,
        'municipis' => MunicipiController::class,
        'provincies' => ProvincieController::class,
        'persones' => PersoneController::class,
        'multiplicadors' => MultiplicadorController::class,
        'mostres' => MostreController::class,
        'lots' => LotController::class,
        'packs' => PackController::class
    ]);
    
});