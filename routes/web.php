<?php

use Illuminate\Support\Facades\Route;
// use App\Livewire\ModemList;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Route::get('modem', ModemList::class);
    Route::get('modem', \App\Livewire\ModemList::class)->name('modem');
    Route::get('expediente', \App\Livewire\Expedientes::class)->name('expediente');
});
