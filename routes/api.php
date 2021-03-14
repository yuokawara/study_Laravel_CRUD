<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    $message = 'Hello';
    return response()->json([
        'message' => $message
    ]);
});
Route::get('/point', function () {
    $rankings = DB::table('rankings')->get();
    return response()->json([
        'rankings' => $rankings
    ]);
});
// Route::get('/point', [PointController::class, 'point'])->name('point');