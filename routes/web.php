<?php

use App\Http\Controllers\UserController;
use App\Jobs\TestQueueJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schedule;

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');
    Route::put('/users/{user}/interests', [UserController::class, 'updateInterests'])->name('users.updateInterests');
    Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

Schedule::call(function() {
    Log::info('Tarefa agendada executada com sucesso!');
})->everyMinute();

Route::get('/deploy', function() {
    Artisan::call('app:deploy');
});



