<?php

use App\Http\Controllers\AsidebarController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MainNavController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('mainnav/{mainnav}', [MainNavController::class, 'show']);

Route::get('asidebar/{mainnav}', [AsidebarController::class, 'show']);