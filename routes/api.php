<?php

use App\Http\Controllers\AsidebarController;
use App\Http\Controllers\CurrentUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainNavController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResetController;
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


// Login Routes
Route::post('/login', [LoginController::class,'Login']);

// Register Routes
Route::post('/register', [LoginController::class,'Register']);

// Forget Password Routes
Route::post('/forgetpassword', [ForgetController::class,'ForgetPassword']);

// Reset Password Routes
Route::post('/resetpassword', [ResetController::class,'ResetPassword']);

// Current User Routes
Route::get('/currentuser', [CurrentUserController::class,'CurrentUser'])->middleware('auth:api');

// mainnav api
Route::get('data', [MainNavController::class, 'getData']);

// item api

Route::post('/itemsave', [ItemController::class, 'storeItem'])->name('api.itemsave');

Route::post('/getmaxid', [ItemController::class, 'getMaxId'])->name('api.getmaxid');

Route::post('/fetchitem', [ItemController::class, 'fetchitem'])->name('item.fetchitem');

Route::delete('/deleteitem', [ItemController::class, 'deleteitem'])->name('item.deleteitem');

// department store

Route::post('/departmentsave', [DepartmentController::class, 'storedepartment'])->name('api.departmentsave');

