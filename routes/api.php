<?php

use Illuminate\Http\Request;
use App\Modules\Tasks\Http\Controllers\TaskController;
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


Route::controller(TaskController::class)->group(function () {
    Route::get("/tasks", "index");
    Route::get("/tasks/{id}", "show")->where("id", "[0-9]+");
    Route::post("/tasks", "store");
    Route::put("/tasks/{id}", "update")->where("id", "[0-9]+");
    Route::delete("/tasks/{id}", "destroy")->where("id", "[0-9]+");
});
