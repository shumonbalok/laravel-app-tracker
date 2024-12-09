<?php

use Illuminate\Support\Facades\Route;
use Shumonpal\LaravelAppTracker\Controllers\LicenceKeyController;
use Shumonpal\LaravelAppTracker\Controllers\LicenceKeyUserController;
use Shumonpal\LaravelAppTracker\Controllers\LicenceUserController;

Route::prefix('app-tracker')->name('app-tracker.')->middleware('web')->group(function () {
    Route::resource('licence-keys', LicenceKeyController::class)->only(['index', 'store', 'destroy']);
    Route::resource('licence-key-users', LicenceKeyUserController::class)->only(['index', 'destroy']);
    Route::resource('licence-users', LicenceUserController::class)->only(['index', 'destroy']);
});
