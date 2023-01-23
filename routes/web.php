<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/event/create', App\Http\Livewire\EventAdd::class)->name('event-add');
    Route::get('/events', App\Http\Livewire\EventList::class)->name('event-list');
    Route::get('/event/{event}/edit', App\Http\Livewire\EventEdit::class)->name('event-edit');

    Route::get('/participants/{event}', App\Http\Livewire\ParticipantList::class)->name('participant-list');
    Route::get('/participant/{participant}/edit', App\Http\Livewire\ParticipantEdit::class)->name('participant-edit');
});
