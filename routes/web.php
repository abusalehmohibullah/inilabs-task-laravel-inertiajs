<?php

use App\Http\Controllers\CalculateAreaController;
use App\Http\Controllers\ValidParenthesesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::get('/valid-parentheses', [ValidParenthesesController::class, 'showForm'])->name('valid-parentheses.show');
Route::post('/valid-parentheses', [ValidParenthesesController::class, 'validateParentheses'])->name('valid-parentheses.validate');
Route::get('/calculate-area', [CalculateAreaController::class, 'showForm'])->name('calculate-area.show');
Route::post('/calculate-area', [CalculateAreaController::class, 'calculateArea'])->name('calculate-area.calculate');
