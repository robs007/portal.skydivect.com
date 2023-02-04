<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;




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
    return view('auth.login');
})->name('home');

//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');
//
//
//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


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
    Route::get('/participant/{event}/create', App\Http\Livewire\ParticipantAdd::class)->name('participant-add');

    Route::get('/users', App\Http\Livewire\UserList::class)->name('users-list');
});
