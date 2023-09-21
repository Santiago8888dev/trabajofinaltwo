<?php

use App\Livewire\Crud\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Cambia la ruta y apunta directamente al componente Livewire Index
    Route::get('/crud', Index::class)->name('crud.index');
});
