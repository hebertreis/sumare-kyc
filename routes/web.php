<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\OcupacaoController;
use App\Livewire\MultiStepForm;
use App\Livewire\Receivers;
use App\Livewire\CreateReceiver;


Route::view('/', 'welcome');



// Rota para listar dados do Firebase
Route::get('/firebase', [FirebaseController::class, 'index'])->name('firebase.index');

Route::get('/ocupacoes/search', [OcupacaoController::class, 'search'])->name('ocupacoes.search');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/receivers', Receivers::class)
    ->middleware(['auth'])
    ->name('receivers');


Route::get('/public/create-receiver', CreateReceiver::class)
    ->middleware(['auth'])
    ->name('receivers');    

require __DIR__.'/auth.php';
