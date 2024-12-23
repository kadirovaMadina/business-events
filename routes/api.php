<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;

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


// Routes for Users
Route::apiResource('users', UserController::class);

// Routes for Project Categories
Route::apiResource('project-categories', ProjectCategoryController::class);

// Routes for Projects
Route::apiResource('projects', ProjectController::class);

// Routes for Event Categories
Route::apiResource('event-categories', EventCategoryController::class);

// Routes for Events
Route::apiResource('events', EventController::class);
