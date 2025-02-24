<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Employees\App\Controllers\StoreEmployeeController;
use Lightit\Backoffice\Tasks\App\Controllers\GetTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\ListTasksController;
use Lightit\Backoffice\Tasks\App\Controllers\UpsertTaskController;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)->withTrashed();
        Route::post('/', StoreUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });

Route::post('/employees', StoreEmployeeController::class)->name('employees');
Route::get('/employees', ListEmployeesController::class);
Route::get('/tasks', ListTasksController::class);
Route::get('/tasks/{task}', GetTaskController::class);
Route::post('/tasks', UpsertTaskController::class)->name('tasks');
