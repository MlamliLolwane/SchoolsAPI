<?php

use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/schools/store', [SchoolController::class, 'store']);
Route::get('/schools/index', [SchoolController::class, 'index']);
Route::get('/schools/show/{school_id}', [SchoolController::class, 'show']);
Route::patch('/schools/update', [SchoolController::class, 'update']);
Route::delete('/schools/delete', [SchoolController::class, 'delete']);