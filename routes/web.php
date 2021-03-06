<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Controller追記時はここに
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\VersionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{any?}', fn() => view('index'))->where('any', '.+');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/input', [ContentController::class, 'input'])->name('input');
Route::get('/point', [PointController::class, 'point'])->name('point');
Route::get('/version', [VersionController::class, 'index'])->name('version');
Route::resource('todo', TodoController::class);

Route::resource('ranking', RankingController::class);
// Route::grope(['prefix => admin'], function() {
//     Route::get('point/create', 'Admin\PointController@add');
// });
