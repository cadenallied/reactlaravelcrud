<?php

// routes/api.php
// This file defines API routes for the Laravel application.
// The Route::apiResource method automatically creates RESTful routes for the Employee resource.
// These routes are handled by the EmployeeController and are grouped under the 'api' middleware for stateless API access.

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::middleware('api')->group(function () {
    // Creates routes for index, store, show, update, and destroy actions
    Route::apiResource('employees', EmployeeController::class);
});
