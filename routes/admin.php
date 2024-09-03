<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\checkIfAdmin;



Route::middleware(['auth', CheckIfAdmin::class])->group(function () {
    Route::get('/AdDashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dash');
});