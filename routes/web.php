<?php

use Illuminate\Support\Facades\Route;
use Kacedeveloperz\Permissionui\Http\Controllers\PermissionController;
use Kacedeveloperz\Permissionui\Http\Controllers\RoleController;

// use Kacedeveloperz\Contactform\Http\Controllers\ContactFormController;

Route::middleware(['guest', 'web'])->group(function () {

    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('/assign-permission', [RoleController::class, 'assignPermissionView'])->name('assign.permission.show');
    Route::patch('/assign-permission/{role}', [RoleController::class, 'assignPermission'])->name('permission.assign');
    
});
