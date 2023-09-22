<?php

use App\Livewire\AlumnoCreate;

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

});

Route::livewire('/alumnos', AlumnoCreate::class);
