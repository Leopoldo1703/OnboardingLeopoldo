<?php

use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Exceptions\InvalidActionException;
use Lightit\Backoffice\Employees\App\Controllers\StoreEmployeeController;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Tasks\App\Controllers\GetTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\ListTasksController;
use Lightit\Backoffice\Tasks\App\Controllers\UpsertTaskController;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('{unknown}', static fn () => view('app  '))->where('unknown', '^(?!api).*$');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::post('/employees', StoreEmployeeController::class)->name('employees');
    Route::get('/employees', ListEmployeesController::class);
    Route::get('/tasks', ListTasksController::class);
    Route::get('/tasks/{task}', GetTaskController::class);
    Route::post('/tasks', UpsertTaskController::class)->name('tasks');
});
