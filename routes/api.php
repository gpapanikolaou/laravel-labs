<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\SkillsController;
use App\Http\Controllers\API\UsersSkillsController;
use App\Http\Controllers\API\UsersVacationsController;
use App\Http\Controllers\API\DepartmentsController;
use App\Http\Controllers\API\DepartmentsUsersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', UsersController::class, ['only' => ['index','show','store','update','destroy']]);
Route::apiResource('/skills', SkillsController::class, ['only' =>['index','store','update','destroy']]);
Route::apiResource('/users/{id}/skills',UsersSkillsController::class,['only' =>['index','store']]);
Route::apiResource('/users/{id}/vacations',UsersVacationsController::class, ['only' => ['index','show','store','update','destroy']]);
Route::apiResource('/departments',DepartmentsController::class,['only' =>['index','show','store','update','destroy']]);
Route::get('/departments/{id}/manager',[DepartmentsController::class, 'manager']);
Route::apiResource('/users/{id}/departments',DepartmentsUsersController::class,['only' =>['store','destroy']]);
