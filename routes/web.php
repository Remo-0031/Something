<?php

use App\Events\chirpUploaded;
use App\Mail\signUpWelcome;
use App\Models\Chirp;
use App\Modules\Chirp\Controller\ChirpController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        $chirps = Chirp::with('User')->orderBy('updated_at','desc')->get();
        return Inertia::render('index',compact('chirps'));
    })->name('dashboard');
    Route::post('/chirp',[ChirpController::class,'store'])->name('chirp.store');
});

Route::get('/text',function(){
    Mail::to('remoremoremo0031@gmail.com')->send(new signUpWelcome()); 
    return 'test Sucess';
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
