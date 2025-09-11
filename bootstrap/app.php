<?php

use App\Mail\WelcomeMailable;
use App\Notifications\SendWelcomeNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->withSchedule(function (Schedule $schedule) {
        // (new WelcomeMailable())->to($notifiable->email);

        $schedule->call(function() {
            $user = \App\Models\User::first();
            $user->notify(new SendWelcomeNotification());
        })->everyMinute();
    })->create();
