<?php

use App\Http\Controllers\GapokController;
use App\Http\Controllers\GapokPegawaiController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenagihController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TukinController;
use App\Http\Controllers\TuPegController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('pegawais', PegawaiController::class);
    Route::get('file-import-export', [PegawaiController::class, 'fileImportExport']);
    Route::post('file-import', [PegawaiController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [PegawaiController::class, 'file-export']);
    Route::resource('pangkats', PangkatController::class);
    Route::resource('gapoks', GapokController::class);
    Route::resource('gapegs', GapokPegawaiController::class);
    Route::resource('tukins', TukinController::class);
    Route::resource('tupegs', TuPegController::class);
    Route::resource('penagihs', PenagihController::class);
    Route::resource('tagihans', TagihanController::class);
    // Route::get('gapegs', 'GapokPegawaiController@index')->name('gapegs.index');
    // Route::get('gapegs/create', 'GapokPegawaiController@create')->name('gapegs.create');
    // Route::post('gapegs', 'GapokPegawaiController@store')->name('gapegs.store');
    // Route::get('gapegs/lihat/{id}', [GapokPegawaiController::class, 'detail'])->name('gapegs.show');
    Route::post('gaji-import', [GapokPegawaiController::class, 'gapokImport'])->name('gaji-import');
    Route::post('tunkin-import', [TuPegController::class, 'tupegImport'])->name('tunkin-import');



});
